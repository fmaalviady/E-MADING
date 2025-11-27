@extends('layouts.app')

@section('title', 'Kelola Komentar - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Kelola Komentar</h2>
                            <p style="color: #27391c; margin: 0;">Kelola semua komentar dari pengguna</p>
                        </div>
                        <div>
                            <a href="{{ route('dashboard.admin') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Kembali</a>
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
                <div class="comments-list" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="table-responsive">
                        <table class="table" style="width: 100%;">
                            <thead style="background: #18230f; color: white;">
                                <tr>
                                    <th style="padding: 15px;">No</th>
                                    <th style="padding: 15px;">Pengguna</th>
                                    <th style="padding: 15px;">Artikel</th>
                                    <th style="padding: 15px;">Komentar</th>
                                    <th style="padding: 15px;">Tanggal</th>
                                    <th style="padding: 15px; text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comments as $index => $comment)
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 15px;">{{ $comments->firstItem() + $index }}</td>
                                    <td style="padding: 15px;">
                                        <strong>{{ $comment->user->name ?? 'Unknown' }}</strong><br>
                                        <small style="color: #666;">{{ $comment->user->email ?? '-' }}</small>
                                    </td>
                                    <td style="padding: 15px;">
                                        <a href="{{ route('articles.show', $comment->id_artikel) }}" style="color: #1f7d53; text-decoration: none;">
                                            {{ Str::limit($comment->article->judul ?? 'Artikel Dihapus', 50) }}
                                        </a>
                                    </td>
                                    <td style="padding: 15px;">{{ Str::limit($comment->isi_comment, 100) }}</td>
                                    <td style="padding: 15px;">{{ \Carbon\Carbon::parse($comment->tanggal_comment)->format('d M Y H:i') }}</td>
                                    <td style="padding: 15px; text-align: center;">
                                        <a href="{{ route('comments.show', $comment->id_comment) }}" class="btn btn-sm" style="background: #1f7d53; color: white; border: none; padding: 5px 15px; border-radius: 5px; text-decoration: none; display: inline-block; margin-right: 5px;">Detail</a>
                                        <form action="{{ route('comments.destroy', $comment->id_comment) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="background: #dc3545; color: white; border: none; padding: 5px 15px; border-radius: 5px; cursor: pointer;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" style="padding: 30px; text-align: center; color: #666;">Belum ada komentar</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
