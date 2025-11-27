@extends('layouts.app')

@section('title', 'Register - Mading Fasya')

@section('content')
<div class="register-area" style="background: linear-gradient(135deg, #18230f 0%, #27391c 100%); min-height: 100vh; display: flex; align-items: center; padding: 40px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="register-form" style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                    <div class="text-center mb-30">
                        <h3 style="color: #18230f; margin-bottom: 8px;">Daftar Akun Baru</h3>
                        <p style="color: #27391c; font-size: 14px;">Buat akun untuk mengakses Mading Fasya</p>
                    </div>
                    
                    @if(session('error'))
                        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Username</label>
                            <input type="text" name="username" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Masukkan username" value="{{ old('username') }}" required>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Password</label>
                            <input type="password" name="password" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Masukkan password" required>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Konfirmasi password" required>
                        </div>
                        
                        <div class="form-group mb-25">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Daftar Sebagai</label>
                            <select name="role" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" required>
                                <option value="">Pilih Role</option>
                                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #255f38, #1f7d53); border: none; padding: 12px; border-radius: 8px; font-size: 16px; font-weight: 500; color: white; width: 100%; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(24, 35, 15, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            Daftar
                        </button>
                        
                        <div class="text-center mt-20">
                            <p style="color: #27391c; font-size: 14px;">Sudah punya akun? <a href="{{ route('login') }}" style="color: #255f38; font-weight: 500; text-decoration: none;">Login di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
