@extends('layouts.app')

@section('title', 'Dashboard Admin - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Dashboard Admin</h2>
                            <p style="color: #27391c; margin: 0;">Selamat datang di panel admin Mading Fasya</p>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #18230f, #27391c); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">150</h3>
                    <p style="margin: 5px 0 0 0;">Total Siswa</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #27391c, #255f38); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">25</h3>
                    <p style="margin: 5px 0 0 0;">Total Guru</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #255f38, #1f7d53); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">45</h3>
                    <p style="margin: 5px 0 0 0;">Total Artikel</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: linear-gradient(45deg, #1f7d53, #255f38); padding: 25px; border-radius: 10px; color: white; text-align: center;">
                    <h3 style="margin: 0; font-size: 2rem;">12</h3>
                    <p style="margin: 5px 0 0 0;">Artikel Hari Ini</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="admin-menu" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Menu Admin</h4>
                    <div class="row">
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('users.index') }}" class="menu-item" style="display: block; background: #18230f; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Kelola Pengguna</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('articles.admin') }}" class="menu-item" style="display: block; background: #27391c; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Kelola Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('categories.index') }}" class="menu-item" style="display: block; background: #255f38; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Kelola Kategori</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('articles.moderation') }}" class="menu-item" style="display: block; background: #1f7d53; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Moderasi Artikel</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('reports.index') }}" class="menu-item" style="display: block; background: #27391c; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Laporan</h5>
                            </a>
                        </div>
                        <div class="col-md-6 mb-20">
                            <a href="{{ route('comments.index') }}" class="menu-item" style="display: block; background: #18230f; color: white; padding: 20px; border-radius: 8px; text-decoration: none; text-align: center;">
                                <h5 style="margin: 0; color: white;">Kelola Komentar</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="recent-activity" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 25px;">Aktivitas Terbaru</h4>
                    <div class="activity-item" style="padding: 15px 0; border-bottom: 1px solid #255f38;">
                        <p style="margin: 0; font-size: 14px; color: #27391c;">Artikel baru ditambahkan</p>
                        <small style="color: #255f38;">2 jam yang lalu</small>
                    </div>
                    <div class="activity-item" style="padding: 15px 0; border-bottom: 1px solid #255f38;">
                        <p style="margin: 0; font-size: 14px; color: #27391c;">User baru mendaftar</p>
                        <small style="color: #255f38;">5 jam yang lalu</small>
                    </div>
                    <div class="activity-item" style="padding: 15px 0;">
                        <p style="margin: 0; font-size: 14px; color: #27391c;">Artikel disetujui</p>
                        <small style="color: #255f38;">1 hari yang lalu</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection