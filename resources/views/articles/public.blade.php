@extends('layouts.app')

@section('title', 'Artikel Publik - Mading Fasya')

@section('content')
<div class="articles-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @if(session('user'))
                            <a href="{{ $dashboardUrl }}" class="btn" style="background: #255f38; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">
                                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                            </a>
                        @else
                            <div></div>
                        @endif
                        <a href="/" class="btn" style="background: #70b2b2; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none;">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </div>
                    <h2 style="color: #18230f; text-align: center;">Artikel Mading Fasya</h2>
                    <p style="color: #27391c; text-align: center; margin: 0;">Baca artikel terbaru dari SMK Bakti Nusantara 666</p>
                    
                    <!-- Search Form -->
                    <form method="GET" action="{{ route('articles.public') }}" class="mt-3">
                        <div class="input-group" style="max-width: 400px; margin: 0 auto;">
                            <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request('search') }}" style="border-radius: 25px 0 0 25px;">
                            <button class="btn" type="submit" style="background: #255f38; color: white; border-radius: 0 25px 25px 0;">Cari</button>
                        </div>
                    </form>
                    
                    @if(request('search'))
                    <div class="text-center mt-3">
                        <p style="color: #27391c; margin-bottom: 10px;">Hasil pencarian untuk: <strong>"{{ request('search') }}"</strong> ({{ $articles->count() }} artikel)</p>
                        <a href="{{ route('articles.public') }}" class="btn btn-sm" style="background: #e74c3c; color: white; padding: 5px 15px; border-radius: 15px; text-decoration: none;">
                            <i class="fas fa-times"></i> Hapus Pencarian
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            @if($articles->count() > 0)
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="article-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <img src="{{ $article->foto ? asset('storage/articles/' . $article->foto) : asset('assets/img/smk-bakti-nusantara.jpg') }}" alt="{{ $article->judul }}" style="width: 100%; height: 200px; object-fit: cover;" onerror="this.src='{{ asset('assets/img/smk-bakti-nusantara.jpg') }}'">
                    <div class="card-content" style="padding: 20px;">
                        <span class="category" style="background: #255f38; color: white; padding: 4px 12px; border-radius: 15px; font-size: 12px;">{{ $article->category->nama_kategori ?? 'Umum' }}</span>
                        <h4 style="color: #18230f; margin: 15px 0 10px 0;">{{ $article->judul }}</h4>
                        <p style="color: #555; font-size: 14px; line-height: 1.6;">{{ Str::limit($article->isi, 100) }}</p>
                        <div class="article-meta" style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                            <small style="color: #27391c;">{{ $article->tanggal }}</small>
                            <div class="interaction-section" style="display: flex; gap: 15px;">
                                <button class="like-btn" data-id="{{ $article->id_artikel }}" style="background: none; border: none; color: #255f38; cursor: pointer;">
                                    <i class="fas fa-heart"></i> <span class="like-count">{{ $article->likes->count() }}</span>
                                </button>
                                <span style="color: #27391c;"><i class="fas fa-comment"></i> {{ $article->comments->count() }}</span>
                            </div>
                        </div>
                        
                        <!-- Comments Section -->
                        <div class="comments-section" style="margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
                            @if(session('user'))
                            <form class="comment-form" data-article="{{ $article->id_artikel }}" style="margin-bottom: 15px;">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control comment-input" placeholder="Tulis komentar..." style="border-radius: 15px 0 0 15px;" required>
                                    <button type="submit" class="btn" style="background: #255f38; color: white; border-radius: 0 15px 15px 0;">Kirim</button>
                                </div>
                            </form>
                            @else
                            <p style="text-align: center; color: #666; font-style: italic;">Silakan <a href="/login" style="color: #255f38;">login</a> untuk memberikan komentar</p>
                            @endif
                            
                            <div class="comments-list">
                                @foreach($article->comments->take(3) as $comment)
                                <div class="comment-item" style="background: #f8f9fa; padding: 10px; border-radius: 8px; margin-bottom: 8px;">
                                    <strong style="color: #18230f;">{{ $comment->user->name }}</strong>
                                    <p style="margin: 5px 0 0 0; font-size: 14px;">{{ $comment->isi_comment }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12">
                <div class="text-center" style="background: white; padding: 50px; border-radius: 10px;">
                    <i class="fas fa-search" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                    <h4 style="color: #27391c;">Tidak ada artikel ditemukan</h4>
                    @if(request('search'))
                    <p style="color: #666;">Tidak ada artikel yang sesuai dengan pencarian "{{ request('search') }}"</p>
                    <a href="{{ route('articles.public') }}" class="btn" style="background: #255f38; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-top: 10px;">
                        Lihat Semua Artikel
                    </a>
                    @else
                    <p style="color: #666;">Belum ada artikel yang dipublikasikan</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if user is logged in
    const isLoggedIn = {{ session('user') ? 'true' : 'false' }};
    
    // Like functionality
    document.querySelectorAll('.like-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (!isLoggedIn) {
                alert('Silakan login terlebih dahulu untuk memberikan like');
                return;
            }
            
            const articleId = this.dataset.id;
            const likeCountSpan = this.querySelector('.like-count');
            
            fetch('/articles/' + articleId + '/like', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    likeCountSpan.textContent = data.count;
                    this.style.color = data.liked ? '#e74c3c' : '#255f38';
                } else {
                    alert('Terjadi kesalahan saat memberikan like');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memberikan like');
            });
        });
    });
    
    // Comment functionality
    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!isLoggedIn) {
                alert('Silakan login terlebih dahulu untuk mengirim komentar');
                return;
            }
            
            const articleId = this.dataset.article;
            const input = this.querySelector('.comment-input');
            const comment = input.value.trim();
            const submitBtn = this.querySelector('button[type="submit"]');
            
            if (!comment) {
                alert('Komentar tidak boleh kosong');
                return;
            }
            
            // Disable button during submission
            submitBtn.disabled = true;
            submitBtn.textContent = 'Mengirim...';
            
            fetch('/comments', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    id_artikel: articleId,
                    isi_comment: comment
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    input.value = '';
                    location.reload();
                } else {
                    alert('Terjadi kesalahan saat mengirim komentar');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim komentar');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Kirim';
            });
        });
    });
});
</script>
@endsection