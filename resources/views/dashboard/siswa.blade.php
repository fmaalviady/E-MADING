@extends('layouts.app')

@section('title', 'Dashboard Siswa - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Dashboard Siswa</h2>
                            <p style="color: #27391c; margin: 0;">Baca artikel dan tulis karya Anda</p>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Beranda</a>
                        </div>
                    </div>
                    @if(session('error'))
                        <div class="alert alert-danger mt-3" style="background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; border-radius: 8px;">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #18230f, #27391c); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">3</h3>
                    <p style="margin: 5px 0 0 0;">Artikel Saya</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #27391c, #255f38); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">25</h3>
                    <p style="margin: 5px 0 0 0;">Artikel Dibaca</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #255f38, #1f7d53); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">5</h3>
                    <p style="margin: 5px 0 0 0;">Komentar</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="siswa-menu" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Menu Siswa</h4>
                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('articles.public') }}" class="menu-item" style="display: block; background: #18230f; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Baca Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ url('/articles/create') }}" class="menu-item" style="display: block; background: #27391c; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Tulis Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ url('/articles') }}" class="menu-item" style="display: block; background: #255f38; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Artikel Saya</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('profile.show') }}" class="menu-item" style="display: block; background: #1f7d53; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Profil Saya</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recommended-articles" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Artikel Rekomendasi</h4>
                    <div class="article-item" style="padding: 15px 0; border-bottom: 1px solid #ecf0f1;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Tips Sukses PKL</h6>
                        <small style="color: #27391c;">Oleh: Pak Budi</small>
                    </div>
                    <div class="article-item" style="padding: 15px 0; border-bottom: 1px solid #255f38;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Kompetisi Programming</h6>
                        <small style="color: #27391c;">Oleh: Bu Sari</small>
                    </div>
                    <div class="article-item" style="padding: 15px 0;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Karir di Bidang IT</h6>
                        <small style="color: #27391c;">Oleh: Pak Ahmad</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection