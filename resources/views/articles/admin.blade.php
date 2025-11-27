@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Artikel</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->judul }}</td>
                    <td>{{ $article->category->nama_kategori ?? '-' }}</td>
                    <td>{{ $article->user->name ?? '-' }}</td>
                    <td>{{ $article->tanggal }}</td>
                    <td>
                        @if($article->status == 'published')
                            <span class="badge badge-success">Published</span>
                        @elseif($article->status == 'pending_review')
                            <span class="badge badge-info">Pending Review</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-primary">Edit</a>
                        @if($article->status == 'draft')
                            <form action="{{ route('articles.approve', $article->id_artikel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                            </form>
                            <form action="{{ route('articles.reject', $article->id_artikel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak artikel ini?')">Tolak</button>
                            </form>
                        @elseif($article->status == 'published')
                            <form action="{{ route('articles.reject', $article->id_artikel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Yakin ingin mengembalikan artikel ini ke draft?')">Kembalikan ke Draft</button>
                            </form>
                        @else
                            <form action="{{ route('articles.publish', $article->id_artikel) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Publish</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection