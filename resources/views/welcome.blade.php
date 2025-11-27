@extends('layouts.app')

@section('title', 'Beranda - E-Mading Fasya')

@section('content')
<style>
.whats-right-img img {
    width: 100%;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.whats-right-img {
    width: 90px;
    height: 60px;
    flex-shrink: 0;
    margin-right: 15px;
}

.most-recent-images {
    width: 90px;
    height: 90px;
    flex-shrink: 0;
    margin-right: 15px;
}

.most-recent-images img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

/* Card styling */
.whats-news-single {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.whats-news-single:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.whats-news-single .whates-img img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.whats-news-single .whates-caption {
    padding: 20px;
}

.whats-news-single .whates-caption h4 {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
    line-height: 1.4;
}

.whats-news-single .whates-caption span {
    color: #7f8c8d;
    font-size: 13px;
    display: block;
    margin-bottom: 10px;
}

.whats-news-single .whates-caption p {
    color: #555;
    font-size: 14px;
    line-height: 1.6;
}

.whats-right-single {
    background: white;
    border-radius: 8px;
    padding: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.whats-right-single:hover {
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
    transform: translateX(5px);
}

.whats-right-cap h4 {
    font-size: 14px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.3;
}

.whats-right-cap span {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 8px;
}

.whats-right-cap p {
    color: #7f8c8d;
    font-size: 12px;
    margin: 0;
}

.most-recent-area {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.most-recent-img {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
}

.most-recent-img img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.most-recent-cap {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    padding: 20px;
    color: white;
}

.most-recent-cap h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
    line-height: 1.3;
}

.most-recent-cap span {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    margin-bottom: 10px;
}

.most-recent-single {
    padding: 12px;
    border-radius: 8px;
    transition: background 0.3s ease;
}

.most-recent-single:hover {
    background: #f8f9fa;
}

.most-recent-capt h4 {
    font-size: 14px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 5px;
    line-height: 1.3;
}

.most-recent-capt p {
    color: #7f8c8d;
    font-size: 12px;
    margin: 0;
}

.weekly2-single {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.3s ease;
    margin: 0 10px;
}

.weekly2-single:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.weekly2-img img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.weekly2-caption {
    padding: 15px;
}

.weekly2-caption h4 {
    font-size: 15px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.4;
}

.weekly2-caption p {
    color: #7f8c8d;
    font-size: 12px;
    margin: 0;
}

/* Ensure links are clickable */
.whats-news-single a,
.whats-right-single a,
.most-recent-cap a,
.most-recent-capt a,
.weekly2-caption a,
.trend-top-cap a {
    cursor: pointer;
    pointer-events: auto;
    z-index: 10;
    position: relative;
}

.small-tittle h4 {
    font-size: 20px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 0;
}
</style>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); position: relative; z-index: 1;">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="slider-active">
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                        @if($latestArticles->isNotEmpty())
                                            @php $hero = $latestArticles->first(); @endphp
                                            <img src="{{ $hero->foto ? asset('storage/articles/' . $hero->foto) : asset('assets/img/gallery/Prestasi Gemilang Siswa SMK Bakti Nusantara 666 di Kompetisi Nasional.jpg') }}" alt="{{ $hero->judul }}" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                            <div class="trend-top-cap" style="background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3)); border-radius: 0 0 15px 15px;">
                                                <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms" style="background: linear-gradient(45deg, #667eea, #764ba2); padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ $hero->category->nama_kategori ?? 'Pendidikan' }}</span>
                                                <h2><a href="{{ route('articles.public') }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">{{ $hero->judul }}</a></h2>
                                                <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms" style="color: #f1f1f1; font-size: 14px;">{{ $hero->user->name ?? 'Admin' }}   -   {{ \Carbon\Carbon::parse($hero->tanggal)->format('d F, Y') }}</p>
                                            </div>
                                        @else
                                            <img src="assets/img/gallery/Prestasi Gemilang Siswa SMK Bakti Nusantara 666 di Kompetisi Nasional.jpg" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            @foreach($latestArticles->skip(1)->take(2) as $article)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30" style="border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                    <div class="trend-top-img">
                                        <img src="{{ $article->foto ? asset('storage/articles/' . $article->foto) : asset('assets/img/gallery/pameran eskul.jpeg') }}" alt="{{ $article->judul }}">
                                        <div class="trend-top-cap trend-top-cap2" style="background: linear-gradient(45deg, rgba(0,0,0,0.8), rgba(0,0,0,0.4)); padding: 20px;">
                                            <span class="bgb" style="background: linear-gradient(45deg, #e74c3c, #c0392b); padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">{{ strtoupper($article->category->nama_kategori ?? 'UMUM') }}</span>
                                            <h2><a href="{{ route('articles.public') }}" style="color: white; text-shadow: 1px 1px 3px rgba(0,0,0,0.7); font-size: 16px; line-height: 1.3;">{{ Str::limit($article->judul, 60) }}</a></h2>
                                            <p style="color: #f1f1f1; font-size: 13px; margin: 5px 0 0 0;">{{ $article->user->name ?? 'Admin' }}   -   {{ \Carbon\Carbon::parse($article->tanggal)->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30">
                                <h3>Berita Terbaru</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <nav>                                                 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Semua</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                    <div class="row">
                                        @if($latestArticles->count() > 0)
                                        <div class="col-xl-6 col-lg-12">
                                            @php $featured = $latestArticles->first(); @endphp
                                            <div class="whats-news-single mb-40">
                                                <a href="{{ route('articles.public') }}" style="text-decoration: none; color: inherit; display: block;">
                                                    <div class="whates-img">
                                                        <img src="{{ $featured->foto ? asset('storage/articles/' . $featured->foto) : asset('assets/img/gallery/BACK TO SCHOOL.jpg') }}" alt="{{ $featured->judul }}">
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4>{{ $featured->judul }}</h4>
                                                        <span>oleh {{ $featured->user->name ?? 'Admin' }}   -   {{ \Carbon\Carbon::parse($featured->tanggal)->format('d M Y') }}</span>
                                                        <p>{{ Str::limit(strip_tags($featured->isi), 100) }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                @foreach($latestArticles->skip(1)->take(4) as $article)
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <a href="{{ route('articles.public') }}" style="display: flex; text-decoration: none; color: inherit;">
                                                            <div class="whats-right-img">
                                                                <img src="{{ $article->foto ? asset('storage/articles/' . $article->foto) : asset('assets/img/gallery/Teknologi.jpeg') }}" alt="{{ $article->judul }}">
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{ $article->category->nama_kategori ?? 'Umum' }}</span>
                                                                <h4>{{ Str::limit($article->judul, 80) }}</h4>
                                                                <p>{{ \Carbon\Carbon::parse($article->tanggal)->format('M d, Y') }}</p> 
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-12">
                                            <p class="text-center">Belum ada artikel</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                    <div class="most-recent-area">
                        <div class="small-tittle mb-20">
                            <h4>Artikel Terbaru</h4>
                        </div>
                        @if($latestArticles->isNotEmpty())
                            @php $firstArticle = $latestArticles->first(); @endphp
                            <div class="most-recent mb-40">
                                <a href="{{ route('articles.public') }}" style="text-decoration: none; color: inherit; display: block;">
                                    <div class="most-recent-img">
                                        <img src="{{ $firstArticle->foto ? asset('storage/articles/' . $firstArticle->foto) : asset('assets/img/gallery/olimpiade.jpeg') }}" alt="{{ $firstArticle->judul }}">
                                        <div class="most-recent-cap">
                                            <span class="bgbeg">{{ $firstArticle->category->nama_kategori ?? 'Umum' }}</span>
                                            <h4>{{ Str::limit($firstArticle->judul, 60) }}</h4>
                                            <p>{{ $firstArticle->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($firstArticle->tanggal)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @foreach($latestArticles->skip(1)->take(3) as $article)
                        <div class="most-recent-single">
                            <a href="{{ route('articles.public') }}" style="display: flex; text-decoration: none; color: inherit;">
                                <div class="most-recent-images">
                                    <img src="{{ $article->foto ? asset('storage/articles/' . $article->foto) : asset('assets/img/gallery/Batik1.jpeg') }}" alt="{{ $article->judul }}">
                                </div>
                                <div class="most-recent-capt">
                                    <h4>{{ Str::limit($article->judul, 50) }}</h4>
                                    <p>{{ $article->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($article->tanggal)->format('d M Y') }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="slider-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Artikel Populer</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex justify-content-center">
                                        @forelse($trendingArticles as $article)
                                        <div class="weekly2-single">
                                            <a href="{{ route('articles.public') }}" style="text-decoration: none; color: inherit; display: block;">
                                                <div class="weekly2-img">
                                                    <img src="{{ $article->foto ? asset('storage/articles/' . $article->foto) : asset('assets/img/gallery/weeklyNews1.png') }}" alt="{{ $article->judul }}">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <h4>{{ Str::limit($article->judul, 50) }}</h4>
                                                    <p>{{ $article->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($article->tanggal)->diffForHumans() }}</p>
                                                </div>
                                            </a>
                                        </div>
                                        @empty
                                        <div class="weekly2-single">
                                            <div class="weekly2-caption">
                                                <p>Belum ada artikel populer</p>
                                            </div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!-- End Weekly-News -->
</main>
@endsection
