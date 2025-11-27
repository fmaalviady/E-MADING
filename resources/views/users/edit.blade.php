@extends('layouts.app')

@section('title', 'Edit Pengguna - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h2 style="color: #18230f; text-align: center; margin-bottom: 30px;">Edit Pengguna</h2>
                    
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="name" style="color: #27391c; font-weight: bold;">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="username" style="color: #27391c; font-weight: bold;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="password" style="color: #27391c; font-weight: bold;">Password (kosongkan jika tidak diubah)</label>
                            <input type="password" class="form-control" id="password" name="password" style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="role" style="color: #27391c; font-weight: bold;">Role</label>
                            <select class="form-control" id="role" name="role" required style="padding: 12px; border: 2px solid #ddd; border-radius: 5px;">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                        </div>
                        
                        <div class="form-actions text-center">
                            <button type="submit" class="btn" style="background: #255f38; color: white; padding: 12px 30px; border: none; border-radius: 5px; margin-right: 10px;">Update Pengguna</button>
                            <a href="{{ route('users.index') }}" class="btn" style="background: #6c757d; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection