@extends('layouts.app')

@section('title', 'Moderasi Artikel - Mading Fasya')

@section('content')
<div class="container pt-50 pb-50">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Moderasi Artikel</h2>
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">← Dashboard</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                            <tr>
                                <td>{{ Str::limit($article->judul, 50) }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>{{ $article->category->nama_kategori ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}</td>
                                <td>
                                    @if($article->status == 'published')
                                        <span class="badge badge-success">Published</span>
                                    @else
                                        <span class="badge badge-warning">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id_artikel) }}" class="btn btn-sm btn-info" target="_blank">Lihat Artikel</a>
                                    @if($article->status == 'draft')
                                        <form action="{{ route('articles.approve', $article->id_artikel) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                                        </form>
                                        <form action="{{ route('articles.reject', $article->id_artikel) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak artikel ini?')">Tolak</button>
                                        </form>
                                    @else
                                        <form action="{{ route('articles.reject', $article->id_artikel) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Yakin ingin mengembalikan artikel ini ke draft?')">Kembalikan ke Draft</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada artikel untuk dimoderasi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
