@extends('layouts.app')

@section('title', 'Dashboard Guru - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Dashboard Guru</h2>
                            <p style="color: #27391c; margin: 0;">Kelola artikel dan konten mading</p>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #18230f, #27391c); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">8</h3>
                    <p style="margin: 5px 0 0 0;">Artikel Saya</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #27391c, #255f38); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">5</h3>
                    <p style="margin: 5px 0 0 0;">Artikel Diterbitkan</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #255f38, #1f7d53); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">3</h3>
                    <p style="margin: 5px 0 0 0;">Menunggu Review</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="guru-menu" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Menu Guru</h4>
                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <a href="{{ url('/articles/create') }}" class="menu-item" style="display: block; background: #18230f; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Tulis Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ url('/articles') }}" class="menu-item" style="display: block; background: #27391c; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Artikel Saya</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('articles.moderation') }}" class="menu-item" style="display: block; background: #255f38; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Moderasi Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('profile.show') }}" class="menu-item" style="display: block; background: #27391c; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Profil Saya</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="my-articles" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Artikel Terbaru Saya</h4>
                    <div class="article-item" style="padding: 15px 0; border-bottom: 1px solid #ecf0f1;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Tips Belajar Efektif</h6>
                        <small style="color: #255f38;">Diterbitkan</small>
                    </div>
                    <div class="article-item" style="padding: 15px 0; border-bottom: 1px solid #255f38;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Teknologi di Era Digital</h6>
                        <small style="color: #27391c;">Menunggu Review</small>
                    </div>
                    <div class="article-item" style="padding: 15px 0;">
                        <h6 style="margin: 0 0 5px 0; color: #18230f;">Prestasi Siswa SMK</h6>
                        <small style="color: #255f38;">Diterbitkan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection