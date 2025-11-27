@extends('layouts.app')

@section('title', 'Tambah Pengguna - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h2 style="color: #18230f; text-align: center; margin-bottom: 30px;">Tambah Pengguna Baru</h2>
                    
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="name" style="color: #27391c; font-weight: bold;">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="username" style="color: #27391c; font-weight: bold;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password" style="color: #27391c; font-weight: bold;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="role" style="color: #27391c; font-weight: bold;">Role</label>
                            <select class="form-control" id="role" name="role" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                <option value="">Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        
                        <div class="form-actions text-center">
                            <button type="submit" class="btn" style="background: #255f38; color: white; padding: 12px 30px; border: none; border-radius: 5px; margin-right: 10px;">Tambah Pengguna</button>
                            <a href="{{ route('users.index') }}" class="btn" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection