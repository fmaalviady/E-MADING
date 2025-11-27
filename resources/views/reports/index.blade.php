@extends('layouts.app')

@section('title', 'Laporan - Mading Fasya')

@section('content')
<div class="reports-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header mb-40" style="background: white; padding: 30px; border-radius: 10px;">
                    <h2 style="color: #18230f;">Laporan Sistem E-Mading</h2>
                    <p style="color: #27391c;">Statistik dan aktivitas sistem</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: white; padding: 25px; border-radius: 10px; text-align: center;">
                    <h3 style="color: #18230f; font-size: 2rem;">{{ $totalArticles }}</h3>
                    <p style="color: #27391c;">Total Artikel</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: white; padding: 25px; border-radius: 10px; text-align: center;">
                    <h3 style="color: #255f38; font-size: 2rem;">{{ $publishedArticles }}</h3>
                    <p style="color: #27391c;">Artikel Diterbitkan</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: white; padding: 25px; border-radius: 10px; text-align: center;">
                    <h3 style="color: #1f7d53; font-size: 2rem;">{{ $totalUsers }}</h3>
                    <p style="color: #27391c;">Total Pengguna</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-30">
                <div class="stats-card" style="background: white; padding: 25px; border-radius: 10px; text-align: center;">
                    <h3 style="color: #27391c; font-size: 2rem;">{{ $totalCategories }}</h3>
                    <p style="color: #27391c;">Total Kategori</p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="report-section" style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h4 style="color: #18230f;">Artikel per Kategori</h4>
                    @foreach($articlesByCategory as $category)
                    <div class="category-stat" style="display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee;">
                        <span>{{ $category->nama_kategori }}</span>
                        <span style="color: #255f38; font-weight: bold;">{{ $category->articles_count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="report-section" style="background: white; padding: 30px; border-radius: 10px; margin-bottom: 30px;">
                    <h4 style="color: #18230f;">Aktivitas Terbaru</h4>
                    @foreach($recentActivities as $activity)
                    <div class="activity-item" style="padding: 10px 0; border-bottom: 1px solid #eee;">
                        <p style="margin: 0; font-size: 14px;"><strong>{{ $activity->name }}</strong> - {{ $activity->aksi }}</p>
                        <small style="color: #666;">{{ $activity->waktu }}</small>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection