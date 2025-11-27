@extends('layouts.app')

@section('title', 'Edit Artikel - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-card" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h2 style="color: #18230f; text-align: center; margin-bottom: 30px;">Edit Artikel</h2>
                    
                    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="judul" style="color: #27391c; font-weight: bold;">Judul Artikel</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $article->judul }}" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="id_kategori" style="color: #27391c; font-weight: bold;">Kategori</label>
                                    <select class="form-control" id="id_kategori" name="id_kategori" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id_kategori }}" {{ $article->id_kategori == $category->id_kategori ? 'selected' : '' }}>{{ $category->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="isi" style="color: #27391c; font-weight: bold;">Isi Artikel</label>
                            <textarea class="form-control" id="isi" name="isi" rows="10" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">{{ $article->isi }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="foto" style="color: #27391c; font-weight: bold;">Foto Artikel</label>
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*" style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                    @if($article->foto)
                                    <small style="color: #666;">Foto saat ini: {{ $article->foto }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status" style="color: #27391c; font-weight: bold;">Status</label>
                                    <select class="form-control" id="status" name="status" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                        <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>Published</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions text-center">
                            <button type="submit" class="btn" style="background: #255f38; color: white; padding: 12px 30px; border: none; border-radius: 5px; margin-right: 10px;">Update Artikel</button>
                            <a href="{{ route('articles.admin') }}" class="btn" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection