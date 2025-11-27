<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_artikel' => 'required',
            'isi_comment' => 'required|max:500'
        ]);

        $user = session('user');
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Comment::create([
            'id_artikel' => $request->id_artikel,
            'id_user' => $user->id,
            'isi_comment' => $request->isi_comment,
            'tanggal_comment' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $comments = Comment::with(['user', 'article'])->orderBy('tanggal_comment', 'desc')->paginate(20);
        return view('comments.index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::with(['user', 'article'])->findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Komentar berhasil dihapus');
    }
}