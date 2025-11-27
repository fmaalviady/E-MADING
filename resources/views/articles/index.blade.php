@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Daftar Artikel</h1>
    </div>
    
    @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $article->foto ? asset($article->foto) : asset('pp.jpg') }}" class="card-img-top" alt="{{ $article->judul }}" style="height: 200px; object-fit: cover;">
                        <small>Debug: {{ $article->foto ?? 'No foto' }}</small>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->judul }}</h5>
                            <p class="card-text">{{ Str::limit($article->isi, 100) }}</p>
                            <small class="text-muted">
                                Kategori: {{ $article->category->nama_kategori ?? 'Tidak ada kategori' }} | 
                                Penulis: {{ $article->user->name ?? 'Tidak diketahui' }} |
                                {{ $article->tanggal }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Belum ada artikel yang dipublikasi.</p>
    @endif
</div>
@endsection