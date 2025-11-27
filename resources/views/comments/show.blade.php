@extends('layouts.app')

@section('title', 'Detail Komentar - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Detail Komentar</h2>
                            <p style="color: #27391c; margin: 0;">Informasi lengkap komentar</p>
                        </div>
                        <div>
                            <a href="{{ route('comments.index') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="comment-detail" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px; border-bottom: 2px solid #1f7d53; padding-bottom: 10px;">Isi Komentar</h4>
                    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #1f7d53;">
                        <p style="margin: 0; color: #27391c; line-height: 1.8; font-size: 16px;">{{ $comment->isi_comment }}</p>
                    </div>

                    <div class="mt-4">
                        <h5 style="color: #18230f; margin-bottom: 15px;">Artikel Terkait</h5>
                        <div style="background: #f8f9fa; padding: 15px; border-radius: 8px;">
                            @if($comment->article)
                                <h6 style="margin: 0 0 10px 0;">
                                    <a href="{{ route('articles.show', $comment->id_artikel) }}" style="color: #1f7d53; text-decoration: none;">
                                        {{ $comment->article->judul }}
                                    </a>
                                </h6>
                                <p style="margin: 0; color: #666; font-size: 14px;">{{ Str::limit($comment->article->isi, 150) }}</p>
                            @else
                                <p style="margin: 0; color: #999;">Artikel telah dihapus</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="comment-info" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); margin-bottom: 20px;">
                    <h5 style="color: #18230f; margin-bottom: 20px;">Informasi Pengguna</h5>
                    <div class="info-item" style="margin-bottom: 15px;">
                        <strong style="color: #27391c;">Nama:</strong>
                        <p style="margin: 5px 0 0 0; color: #666;">{{ $comment->user->name ?? 'Unknown' }}</p>
                    </div>
                    <div class="info-item" style="margin-bottom: 15px;">
                        <strong style="color: #27391c;">Email:</strong>
                        <p style="margin: 5px 0 0 0; color: #666;">{{ $comment->user->email ?? '-' }}</p>
                    </div>
                    <div class="info-item" style="margin-bottom: 15px;">
                        <strong style="color: #27391c;">Role:</strong>
                        <p style="margin: 5px 0 0 0; color: #666;">{{ ucfirst($comment->user->role ?? '-') }}</p>
                    </div>
                    <div class="info-item">
                        <strong style="color: #27391c;">Tanggal Komentar:</strong>
                        <p style="margin: 5px 0 0 0; color: #666;">{{ \Carbon\Carbon::parse($comment->tanggal_comment)->format('d F Y, H:i') }}</p>
                    </div>
                </div>

                <div class="comment-actions" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h5 style="color: #18230f; margin-bottom: 20px;">Aksi</h5>
                    <form action="{{ route('comments.destroy', $comment->id_comment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-block" style="background: #dc3545; color: white; border: none; padding: 12px; border-radius: 5px; cursor: pointer; width: 100%; font-size: 16px;">
                            <i class="fas fa-trash"></i> Hapus Komentar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
