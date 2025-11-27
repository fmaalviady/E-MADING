@extends('layouts.app')

@section('title', 'Tambah Kategori - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-card" style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <h3 style="color: #18230f; margin-bottom: 30px; text-align: center;">Tambah Kategori Baru</h3>
                    
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px;">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px;" placeholder="Masukkan nama kategori" required>
                        </div>
                        
                        <div class="form-actions" style="text-align: center; margin-top: 30px;">
                            <button type="submit" class="btn" style="background: #255f38; color: white; padding: 12px 30px; border-radius: 8px; margin-right: 10px;">Simpan</button>
                            <a href="{{ route('categories.index') }}" class="btn" style="background: #6c757d; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; margin-right: 10px;">Kembali</a>
                            <a href="{{ route('dashboard') }}" class="btn" style="background: #27391c; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none;">← Dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection