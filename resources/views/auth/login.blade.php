@extends('layouts.app')

@section('title', 'Login - Mading Fasya')

@section('content')
<div class="login-area" style="background: linear-gradient(135deg, #18230f 0%, #27391c 100%); min-height: 100vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="login-form" style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                    <div class="text-center mb-30">
                        <h3 style="color: #18230f; margin-bottom: 8px;">Login Mading Fasya</h3>
                        <p style="color: #27391c; font-size: 14px;">Masuk ke akun Anda</p>
                    </div>
                    
                    @if(session('error'))
                        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-20">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Username</label>
                            <input type="text" name="username" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Masukkan username" required>
                        </div>
                        
                        <div class="form-group mb-25">
                            <label style="color: #18230f; font-weight: 500; margin-bottom: 8px; font-size: 14px;">Password</label>
                            <input type="password" name="password" class="form-control" style="padding: 12px; border: 2px solid #255f38; border-radius: 8px; font-size: 14px;" placeholder="Masukkan password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #255f38, #1f7d53); border: none; padding: 12px; border-radius: 8px; font-size: 16px; font-weight: 500; color: white; width: 100%; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(24, 35, 15, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                            Masuk
                        </button>
                        
                        <div class="text-center mt-20">
                            <p style="color: #27391c; font-size: 14px;">Belum punya akun? <a href="{{ route('register') }}" style="color: #255f38; font-weight: 500; text-decoration: none;">Daftar di sini</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection