@extends('layouts.app')

@section('title', 'Artikel Saya - Siswa')

@section('content')
<div class="articles-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="articles-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Artikel Saya</h2>
                            <p style="color: #27391c; margin: 0;">Kelola artikel yang telah Anda tulis</p>
                        </div>
                        <div>
                            <a href="{{ url('/dashboard/siswa') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">← Dashboard</a>
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
                        <div class="row">
                            @foreach($articles as $article)
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="article-card" style="border: 2px solid #ecf0f1; border-radius: 8px; overflow: hidden; height: 100%;">
                                        @if($article->foto)
                                            <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" 
                                                 style="width: 100%; height: 200px; object-fit: cover;">
                                        @else
                                            <div style="width: 100%; height: 200px; background: linear-gradient(45deg, #ecf0f1, #bdc3c7); display: flex; align-items: center; justify-content: center;">
                                                <span style="color: #7f8c8d; font-size: 18px;">📝 Artikel</span>
                                            </div>
                                        @endif
                                        
                                        <div class="article-info" style="padding: 20px;">
                                            <h5 style="color: #18230f; margin-bottom: 10px; font-size: 18px;">{{ $article->judul }}</h5>
                                            <p style="color: #27391c; margin-bottom: 15px; line-height: 1.5;">{{ Str::limit($article->isi, 120) }}</p>
                                            
                                            <div class="article-meta" style="margin-bottom: 15px;">
                                                <small style="color: #255f38; display: block; margin-bottom: 5px;">
                                                    <strong>Kategori:</strong> {{ $article->category->nama_kategori ?? 'Tidak ada kategori' }}
                                                </small>
                                                <small style="color: #27391c; display: block; margin-bottom: 5px;">
                                                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}
                                                </small>
                                                <span class="status-badge" style="
                                                    padding: 4px 12px; 
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
                                                        ✅ Diterbitkan
                                                    @elseif($article->status === 'pending_review')
                                                        ⏳ Menunggu Review
                                                    @else
                                                        📝 Draft
                                                    @endif
                                                </span>
                                            </div>
                                            
                                            <div class="article-actions">
                                                @if($article->status === 'published')
                                                    <small style="color: #155724; font-style: italic;">
                                                        ✨ Artikel Anda telah dipublikasi dan dapat dibaca oleh semua orang
                                                    </small>
                                                @elseif($article->status === 'pending_review')
                                                    <small style="color: #856404; font-style: italic;">
                                                        ⏰ Artikel sedang menunggu persetujuan dari guru
                                                    </small>
                                                @else
                                                    <small style="color: #721c24; font-style: italic;">
                                                        📋 Artikel masih dalam bentuk draft
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="articles-summary mt-30" style="text-align: center; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                            <h5 style="color: #18230f; margin-bottom: 10px;">Ringkasan Artikel Anda</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div style="color: #27391c;">
                                        <strong style="font-size: 24px; color: #1f7d53;">{{ $articles->count() }}</strong>
                                        <br><small>Total Artikel</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="color: #27391c;">
                                        <strong style="font-size: 24px; color: #155724;">{{ $articles->where('status', 'published')->count() }}</strong>
                                        <br><small>Diterbitkan</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="color: #27391c;">
                                        <strong style="font-size: 24px; color: #856404;">{{ $articles->where('status', 'pending_review')->count() }}</strong>
                                        <br><small>Menunggu Review</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="empty-state" style="text-align: center; padding: 60px 20px;">
                            <div style="font-size: 64px; margin-bottom: 20px;">📝</div>
                            <h4 style="color: #18230f; margin-bottom: 15px;">Belum Ada Artikel</h4>
                            <p style="color: #27391c; margin-bottom: 25px;">Anda belum menulis artikel apapun. Mulai berbagi ide dan pengalaman Anda!</p>
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