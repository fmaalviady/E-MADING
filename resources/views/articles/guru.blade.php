@extends('layouts.app')

@section('title', 'Artikel Saya - Guru')

@section('content')
<div class="articles-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="articles-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Kelola Artikel Saya</h2>
                            <p style="color: #27391c; margin: 0;">Kelola dan publikasikan artikel Anda sebagai guru</p>
                        </div>
                        <div>
                            <a href="{{ url('/dashboard/guru') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">← Dashboard</a>
                            <a href="{{ url('/articles/create') }}" class="btn" style="background: #27391c; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">+ Tulis Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            <div class="col-12">
                <div class="articles-content" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    @if($articles->count() > 0)
                        <div class="table-responsive">
                            <table class="table" style="margin-bottom: 30px;">
                                <thead style="background: #f8f9fa;">
                                    <tr>
                                        <th style="color: #18230f; padding: 15px;">Artikel</th>
                                        <th style="color: #18230f; padding: 15px;">Kategori</th>
                                        <th style="color: #18230f; padding: 15px;">Tanggal</th>
                                        <th style="color: #18230f; padding: 15px;">Status</th>
                                        <th style="color: #18230f; padding: 15px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr style="border-bottom: 1px solid #ecf0f1;">
                                            <td style="padding: 15px;">
                                                <div class="d-flex align-items-center">
                                                    @if($article->foto)
                                                        <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" 
                                                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; margin-right: 15px;">
                                                    @else
                                                        <div style="width: 60px; height: 60px; background: #ecf0f1; border-radius: 8px; margin-right: 15px; display: flex; align-items: center; justify-content: center;">
                                                            <span style="color: #7f8c8d;">📝</span>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 style="color: #18230f; margin: 0 0 5px 0; font-size: 16px;">{{ $article->judul }}</h6>
                                                        <small style="color: #27391c;">{{ Str::limit($article->isi, 80) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="padding: 15px; color: #255f38; font-weight: 500;">
                                                {{ $article->category->nama_kategori ?? 'Tidak ada kategori' }}
                                            </td>
                                            <td style="padding: 15px; color: #27391c;">
                                                {{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}
                                            </td>
                                            <td style="padding: 15px;">
                                                <span class="status-badge" style="
                                                    padding: 6px 12px; 
                                                    border-radius: 15px; 
                                                    font-size: 12px; 
                                                    font-weight: bold;
                                                    @if($article->status === 'published') 
                                                        background: #d4edda; color: #155724;
                                                    @elseif($article->status === 'pending_review') 
                                                        background: #fff3cd; color: #856404;
                                                    @else 
                                                        background: #f8d7da; color: #721c24;
                                                    @endif
                                                ">
                                                    @if($article->status === 'published')
                                                        ✅ Published
                                                    @elseif($article->status === 'pending_review')
                                                        ⏳ Review
                                                    @else
                                                        📝 Draft
                                                    @endif
                                                </span>
                                            </td>
                                            <td style="padding: 15px;">
                                                <div class="btn-group">
                                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm" 
                                                       style="background: #255f38; color: white; padding: 5px 10px; border-radius: 3px; text-decoration: none; margin-right: 5px; font-size: 12px;">
                                                        ✏️ Edit
                                                    </a>
                                                    @if($article->status !== 'published')
                                                        <form action="{{ route('articles.publish', $article->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-sm" 
                                                                    style="background: #1f7d53; color: white; padding: 5px 10px; border: none; border-radius: 3px; font-size: 12px;"
                                                                    onclick="return confirm('Publikasikan artikel ini?')">
                                                                🚀 Publish
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="articles-stats" style="background: #f8f9fa; padding: 25px; border-radius: 8px;">
                            <h5 style="color: #18230f; margin-bottom: 20px; text-align: center;">📊 Statistik Artikel Anda</h5>
                            <div class="row">
                                <div class="col-md-3 text-center mb-20">
                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                        <h4 style="color: #1f7d53; margin: 0;">{{ $articles->count() }}</h4>
                                        <small style="color: #27391c;">Total Artikel</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-20">
                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                        <h4 style="color: #155724; margin: 0;">{{ $articles->where('status', 'published')->count() }}</h4>
                                        <small style="color: #27391c;">Diterbitkan</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-20">
                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                        <h4 style="color: #856404; margin: 0;">{{ $articles->where('status', 'pending_review')->count() }}</h4>
                                        <small style="color: #27391c;">Menunggu Review</small>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center mb-20">
                                    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                        <h4 style="color: #721c24; margin: 0;">{{ $articles->where('status', 'draft')->count() }}</h4>
                                        <small style="color: #27391c;">Draft</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state" style="text-align: center; padding: 60px 20px;">
                            <div style="font-size: 64px; margin-bottom: 20px;">👨‍🏫</div>
                            <h4 style="color: #18230f; margin-bottom: 15px;">Belum Ada Artikel</h4>
                            <p style="color: #27391c; margin-bottom: 25px;">Sebagai guru, mulai berbagi pengetahuan dan pengalaman Anda melalui artikel!</p>
                            <a href="{{ url('/articles/create') }}" class="btn" style="background: #1f7d53; color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; font-size: 16px;">
                                ✍️ Tulis Artikel Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection