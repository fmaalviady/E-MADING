@extends('layouts.app')

@section('title', 'Beranda - Mading Fasya')

@section('content')
<style>
.whats-right-img img {
    width: 100%;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
}

.whats-right-img {
    width: 80px;
    height: 50px;
    flex-shrink: 0;
}
</style>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            @forelse($latestArticles->take(3) as $article)
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                        @if($article->foto)
                                            <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="transition: transform 0.3s ease; width: 100%; height: 300px; object-fit: cover;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                        @else
                                            <img src="assets/img/gallery/default-article.jpg" alt="{{ $article->judul }}" style="transition: transform 0.3s ease; width: 100%; height: 300px; object-fit: cover;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                        @endif
                                        <div class="trend-top-cap" style="background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3)); border-radius: 0 0 15px 15px;">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms" style="background: linear-gradient(45deg, #667eea, #764ba2); padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ $article->category->nama_kategori ?? 'Umum' }}</span>
                                            <h2><a href="#" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">{{ $article->judul }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms" style="color: #f1f1f1; font-size: 14px;">{{ $article->user->name ?? 'Admin' }}   -   {{ \Carbon\Carbon::parse($article->tanggal)->format('d F, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <!-- Default content jika tidak ada artikel -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                        <img src="assets/img/gallery/default-article.jpg" alt="" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                        <div class="trend-top-cap" style="background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3)); border-radius: 0 0 15px 15px;">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms" style="background: linear-gradient(45deg, #667eea, #764ba2); padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 600;">Info</span>
                                            <h2><a href="#" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms" style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Belum ada artikel terbaru</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms" style="color: #f1f1f1; font-size: 14px;">Admin   -   {{ date('d F, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <div class="row">
                            @foreach($latestArticles->skip(3)->take(2) as $article)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30" style="border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.15); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                                    <div class="trend-top-img">
                                        @if($article->foto)
                                            <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="assets/img/gallery/pameran eskul.jpeg" alt="{{ $article->judul }}">
                                        @endif
                                        <div class="trend-top-cap trend-top-cap2" style="background: linear-gradient(45deg, rgba(0,0,0,0.8), rgba(0,0,0,0.4)); padding: 20px;">
                                            <span class="bgb" style="background: linear-gradient(45deg, #e74c3c, #c0392b); padding: 5px 12px; border-radius: 15px; font-size: 11px; font-weight: 600;">{{ $article->category->nama_kategori ?? 'UMUM' }}</span>
                                            <h2><a href="#" style="color: white; text-shadow: 1px 1px 3px rgba(0,0,0,0.7); font-size: 16px; line-height: 1.3;">{{ Str::limit($article->judul, 50) }}</a></h2>
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
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30">
                                <h3>Berita Terbaru</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @foreach($categories->take(5) as $index => $category)
                                        <a class="nav-item nav-link {{ $index == 0 ? 'active' : '' }}" id="nav-{{ $category->id }}-tab" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $category->nama_kategori }}</a>
                                        @endforeach
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                @foreach($categories->take(5) as $index => $category)
                                <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="nav-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-{{ $category->id }}-tab">       
                                    <div class="row">
                                        @if(isset($articlesByCategory[$category->id]) && $articlesByCategory[$category->id]->count() > 0)
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                @php $mainArticle = $articlesByCategory[$category->id]->first(); @endphp
                                                <div class="whats-news-single mb-40">
                                                    <div class="whates-img">
                                                        @if($mainArticle->foto)
                                                            <img src="{{ asset('storage/articles/' . $mainArticle->foto) }}" alt="{{ $mainArticle->judul }}" style="width: 100%; height: 200px; object-fit: cover;">
                                                        @else
                                                            <img src="assets/img/gallery/BACK TO SCHOOL.jpg" alt="{{ $mainArticle->judul }}">
                                                        @endif
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="#">{{ $mainArticle->judul }}</a></h4>
                                                        <span>by {{ $mainArticle->user->name ?? 'Admin' }}   -   {{ \Carbon\Carbon::parse($mainArticle->tanggal)->format('d F Y') }}</span>
                                                        <p>{{ Str::limit($mainArticle->isi, 100) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    @foreach($articlesByCategory[$category->id]->skip(1)->take(4) as $article)
                                                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                        <div class="whats-right-single mb-20">
                                                            <div class="whats-right-img">
                                                                @if($article->foto)
                                                                    <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}">
                                                                @else
                                                                    <img src="assets/img/gallery/whats_right_img1.png" alt="{{ $article->judul }}">
                                                                @endif
                                                            </div>
                                                            <div class="whats-right-cap">
                                                                <span class="colorb">{{ $category->nama_kategori }}</span>
                                                                <h4><a href="#">{{ Str::limit($article->judul, 50) }}</a></h4>
                                                                <p>{{ \Carbon\Carbon::parse($article->tanggal)->format('M d, Y') }}</p> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <p class="text-center">Belum ada artikel untuk kategori {{ $category->nama_kategori }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                </div>
                <div class="col-lg-4">
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Artikel Terbaru</h4>
                        </div>
                        @forelse($latestArticles->take(1) as $article)
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                @if($article->foto)
                                    <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: 200px; object-fit: cover;">
                                @else
                                    <img src="assets/img/gallery/most_recent.png" alt="{{ $article->judul }}">
                                @endif
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{ $article->category->nama_kategori ?? 'Umum' }}</span>
                                    <h4><a href="#">{{ Str::limit($article->judul, 50) }}</a></h4>
                                    <p>{{ $article->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($article->tanggal)->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="assets/img/gallery/most_recent.png" alt="">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">Info</span>
                                    <h4><a href="#">Belum ada artikel terbaru</a></h4>
                                    <p>Admin  |  {{ date('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        @foreach($latestArticles->skip(1)->take(2) as $article)
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                @if($article->foto)
                                    <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                    <img src="assets/img/gallery/most_recent1.png" alt="{{ $article->judul }}">
                                @endif
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="#">{{ Str::limit($article->judul, 40) }}</a></h4>
                                <p>{{ $article->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($article->tanggal)->diffForHumans() }}</p>
                            </div>
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
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Artikel Populer</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex justify-content-center">
                                        @forelse($trendingArticles as $article)
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                @if($article->foto)
                                                    <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: 150px; object-fit: cover;">
                                                @else
                                                    <img src="assets/img/gallery/weeklyNews1.png" alt="{{ $article->judul }}">
                                                @endif
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">{{ Str::limit($article->judul, 40) }}</a></h4>
                                                <p>{{ $article->user->name ?? 'Admin' }}  |  {{ \Carbon\Carbon::parse($article->tanggal)->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Belum ada artikel populer</a></h4>
                                                <p>Admin  |  {{ date('M d, Y') }}</p>
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
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30 text-center">
                            <h3>Berita Trending</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="recent-active dot-style d-flex justify-content-center" data-slick='{"autoplay": true, "autoplaySpeed": 3000, "infinite": true, "slidesToShow": 3, "slidesToScroll": 1, "responsive": [{"breakpoint": 768, "settings": {"slidesToShow": 1}}]}'>
                            @forelse($trendingArticles as $article)
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    @if($article->foto)
                                        <img src="{{ asset('storage/articles/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: 200px; object-fit: cover;">
                                    @else
                                        <img src="assets/img/gallery/tranding1.png" alt="{{ $article->judul }}">
                                    @endif
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">{{ Str::limit($article->judul, 50) }}</a></h4>
                                    <P>{{ \Carbon\Carbon::parse($article->tanggal)->format('M d, Y') }}</P>
                                    <a class="popup-video btn-icon" href="#"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            @empty
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#">Belum ada artikel trending</a></h4>
                                    <P>{{ date('M d, Y') }}</P>
                                    <a class="popup-video btn-icon" href="#"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!--Recent Articles End -->
</main>
@endsection