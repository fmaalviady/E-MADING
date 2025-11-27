@extends('layouts.app')

@section('title', $article->judul . ' - Mading Fasya')

@section('content')
<div class="about-area pt-50 pb-50" style="background: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="article-detail" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 30px;">
                    @if($article->foto)
                    <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; border-radius: 8px; margin-bottom: 20px;">
                    @endif
                    
                    <h2 style="color: #18230f; margin-bottom: 20px;">{{ $article->judul }}</h2>
                    
                    <div class="article-meta" style="border-bottom: 2px solid #1f7d53; padding-bottom: 15px; margin-bottom: 25px;">
                        <span style="color: #666; margin-right: 20px;"><i class="fa fa-user"></i> {{ $article->user->name ?? 'Admin' }}</span>
                        <span style="color: #666; margin-right: 20px;"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}</span>
                        <span style="color: #666; margin-right: 20px;"><i class="fa fa-tag"></i> {{ $article->category->nama_kategori ?? 'Umum' }}</span>
                        <span style="color: #666;"><i class="fa fa-heart"></i> {{ $article->likes->count() }} Likes</span>
                    </div>
                    
                    <div class="article-content" style="line-height: 1.8; color: #27391c; font-size: 16px;">
                        {!! nl2br(e($article->isi)) !!}
                    </div>
                </div>

                <div class="comments-section" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px; border-bottom: 2px solid #1f7d53; padding-bottom: 10px;">
                        {{ $article->comments->count() }} Komentar
                    </h4>
                    
                    @forelse($article->comments as $comment)
                    <div class="comment-item" style="padding: 20px; background: #f8f9fa; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #1f7d53;">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <strong style="color: #18230f;">{{ $comment->user->name ?? 'Anonymous' }}</strong>
                                <p style="margin: 10px 0 0 0; color: #27391c;">{{ $comment->isi_comment }}</p>
                            </div>
                            <small style="color: #666;">{{ \Carbon\Carbon::parse($comment->tanggal_comment)->diffForHumans() }}</small>
                        </div>
                    </div>
                    @empty
                    <p style="color: #666; text-align: center; padding: 20px;">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                    @endforelse

                    @if(session('user'))
                    <div class="comment-form mt-4">
                        <h5 style="color: #18230f; margin-bottom: 15px;">Tulis Komentar</h5>
                        <form id="commentForm">
                            @csrf
                            <input type="hidden" name="id_artikel" value="{{ $article->id_artikel }}">
                            <div class="form-group">
                                <textarea name="isi_comment" class="form-control" rows="4" placeholder="Tulis komentar Anda..." required style="border: 2px solid #ddd; border-radius: 5px; padding: 15px;"></textarea>
                            </div>
                            <button type="submit" class="btn" style="background: #1f7d53; color: white; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer;">Kirim Komentar</button>
                        </form>
                    </div>
                    @else
                    <div class="alert" style="background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin-top: 20px;">
                        <a href="{{ route('login') }}" style="color: #1f7d53; font-weight: bold;">Login</a> untuk berkomentar
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-widget" style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    <h5 style="color: #18230f; margin-bottom: 20px;">Tentang Penulis</h5>
                    <div style="text-align: center;">
                        <img src="{{ asset('assets/img/gallery/logobaknus.png') }}" alt="Author" style="width: 80px; height: 80px; border-radius: 50%; margin-bottom: 15px;">
                        <h6 style="color: #27391c; margin-bottom: 5px;">{{ $article->user->name ?? 'Admin' }}</h6>
                        <p style="color: #666; font-size: 14px;">{{ ucfirst($article->user->role ?? 'Penulis') }}</p>
                    </div>
                </div>

                <div class="sidebar-widget" style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h5 style="color: #18230f; margin-bottom: 20px;">Kategori</h5>
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; text-align: center;">
                        <span style="background: #1f7d53; color: white; padding: 8px 20px; border-radius: 20px; display: inline-block;">
                            {{ $article->category->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('commentForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('{{ url("/comments") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            location.reload();
        }
    })
    .catch(error => {
        alert('Terjadi kesalahan saat mengirim komentar');
    });
});
</script>
@endsection
