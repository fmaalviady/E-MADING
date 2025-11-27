@extends('layouts.app')

@section('title', 'Edit Kategori - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h2 style="color: #18230f; text-align: center; margin-bottom: 30px;">Edit Kategori</h2>
                    
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="nama_kategori" style="color: #27391c; font-weight: bold;">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $category->nama_kategori }}" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-actions text-center">
                            <button type="submit" class="btn" style="background: #255f38; color: white; padding: 12px 30px; border: none; border-radius: 5px; margin-right: 10px;">Update Kategori</button>
                            <a href="{{ route('categories.index') }}" class="btn" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; margin-right: 10px;">Batal</a>
                            <a href="{{ route('dashboard') }}" class="btn" style="background: #27391c; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px;">← Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection