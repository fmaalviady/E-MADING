<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Like;
use App\Models\Notification;
use App\Models\User;
use App\Http\Controllers\LogController;

class ArticleController extends Controller
{
    public function index()
    {
        $user = session('user');
        if (!$user) {
            return redirect('/login');
        }

        // Get user's own articles
        $articles = Article::with(['user', 'category'])
                          ->where('id_user', $user->id)
                          ->latest()
                          ->get();
        
        // Determine view based on user role
        if ($user->role === 'siswa') {
            return view('articles.siswa', compact('articles'));
        } else {
            return view('articles.guru', compact('articles'));
        }
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'foto' => 'nullable|image|max:2048'
        ]);

        $user = session('user');
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'id_kategori' => $request->id_kategori,
            'id_user' => $user->id,
            'tanggal' => now()->format('Y-m-d'),
            'status' => $user->role === 'siswa' ? 'draft' : 'published'
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'smk_bakti_nusantara_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/articles'), $filename);
            $data['foto'] = $filename;
        }

        $article = Article::create($data);
        
        if ($user->role === 'siswa') {
            $gurus = User::where('role', 'guru')->get();
            foreach ($gurus as $guru) {
                Notification::create([
                    'id_user' => $guru->id,
                    'id_artikel' => $article->id_artikel,
                    'type' => 'new_article',
                    'message' => $user->name . ' mengirim artikel baru: ' . $request->judul
                ]);
            }
            $successMessage = 'Artikel berhasil dikirim dan menunggu persetujuan dari Guru/Admin';
        } else {
            $successMessage = 'Artikel berhasil dibuat';
        }
        
        LogController::log('Membuat artikel: ' . $request->judul);
        return redirect()->back()->with('success', $successMessage);
    }

    public function publish(int $id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'published']);
        return redirect()->back()->with('success', 'Artikel berhasil dipublikasi');
    }

    public function like(int $id)
    {
        $user = session('user');
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $user_id = $user->id;
        $existing = Like::where('id_artikel', $id)->where('id_user', $user_id)->first();
        
        if ($existing) {
            $existing->delete();
        } else {
            Like::create(['id_artikel' => $id, 'id_user' => $user_id]);
        }
        
        return response()->json(['success' => true]);
    }

    public function admin()
    {
        $articles = Article::with(['user', 'category'])->latest()->get();
        return view('articles.admin', compact('articles'));
    }

    public function public(Request $request)
    {
        $query = Article::with(['category', 'likes', 'comments.user'])
                        ->where('status', 'published');
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('isi', 'like', '%' . $search . '%');
            });
        }
        
        $articles = $query->orderBy('tanggal', 'desc')->get();
        
        $user = session('user');
        $dashboardUrl = '/dashboard/admin';
        
        if ($user) {
            switch ($user->role) {
                case 'guru':
                    $dashboardUrl = '/dashboard/guru';
                    break;
                case 'siswa':
                    $dashboardUrl = '/dashboard/siswa';
                    break;
                default:
                    $dashboardUrl = '/dashboard/admin';
            }
        }
        
        return view('articles.public', compact('articles', 'dashboardUrl'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'id_kategori' => 'required',
            'foto' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published'
        ]);

        $data = $request->only(['judul', 'isi', 'id_kategori', 'status']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'smk_bakti_nusantara_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/articles'), $filename);
            $data['foto'] = $filename;
        }

        $article->update($data);
        return redirect()->route('articles.admin')->with('success', 'Artikel berhasil diupdate');
    }

    public function moderation()
    {
        $articles = Article::with(['user', 'category'])->orderBy('tanggal', 'desc')->get();
        return view('articles.moderation', compact('articles'));
    }

    public function approve($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'published']);
        
        $user = session('user');
        Notification::create([
            'id_user' => $article->id_user,
            'id_artikel' => $article->id_artikel,
            'type' => 'article_published',
            'message' => 'Artikel Anda "' . $article->judul . '" telah dipublikasi oleh ' . $user->name
        ]);
        
        LogController::log('Menyetujui artikel: ' . $article->judul);
        return redirect()->back()->with('success', 'Artikel berhasil disetujui');
    }

    public function reject($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'draft']);
        
        $user = session('user');
        Notification::create([
            'id_user' => $article->id_user,
            'id_artikel' => $article->id_artikel,
            'type' => 'article_rejected',
            'message' => 'Artikel Anda "' . $article->judul . '" ditolak oleh ' . $user->name . ' dan dikembalikan ke draft'
        ]);
        
        LogController::log('Menolak artikel: ' . $article->judul);
        return redirect()->back()->with('success', 'Artikel ditolak dan dikembalikan ke draft');
    }

    public function show($id)
    {
        $article = Article::with(['user', 'category', 'likes', 'comments.user'])
                          ->where('id_artikel', $id)
                          ->where('status', 'published')
                          ->firstOrFail();
        return view('articles.show', compact('article'));
    }
}