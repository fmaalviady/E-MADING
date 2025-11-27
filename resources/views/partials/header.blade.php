<header style="position: relative; z-index: 999;">
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-sm-block" style="background-color: #18230f;">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li class="title"><span class="flaticon-energy"></span> E-Mading Fasya</li>
                                    <li>Platform Digital SMK Bakti Nusantara 666</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-date">
                                    <li><span class="flaticon-calendar"></span> SMK Bakti Nusantara 666</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid" style="background-color: #1f7d53;">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                            <div class="logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/gallery/logobaknus.png') }}" alt="SMK Bakti Nusantara 666" style="max-height: 60px;"></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="header-banner d-flex justify-content-center align-items-center">
                                <div style="background: linear-gradient(45deg, #255f38, #1f7d53); padding: 15px 30px; border-radius: 8px; color: white; text-align: center; width: 100%; max-width: 600px; box-shadow: 0 4px 15px rgba(24, 35, 15, 0.3);">
                                    <h4 style="margin: 0; font-weight: 600; font-size: 18px; text-shadow: 1px 1px 2px rgba(0,0,0,0.3);">🎓 E-Mading Fasya - Inspirasi Generasi Digital</h4>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky" style="background-color: #27391c; position: relative; z-index: 1000;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('assets/img/gallery/logobaknus.png') }}" alt="Mading Fasya"></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>                  
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">BERANDA</a></li>
                                        <li><a href="{{ url('/about') }}">TENTANG</a></li>
                                        @if(session('user'))
                                            <li><a href="{{ route('dashboard') }}">DASHBOARD</a></li>
                                            @if(session('user')->role !== 'siswa')
                                                <li><a href="{{ route('categories.index') }}">KATEGORI</a></li>
                                            @endif
                                        @endif
                                        <li><a href="{{ route('articles.public') }}">ARTIKEL</a></li>

                                        <li><a href="{{ route('contact') }}">KONTAK</a></li>
                                        @if(session('user'))
                                            @if(session('user')->role === 'admin')
                                                <li><a href="{{ route('profile.show') }}">PROFIL</a></li>
                                            @endif
                                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">KELUAR ({{ session('user')->name }})</a></li>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @else
                                            <li><a href="{{ url('/login') }}">MASUK</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>             
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right d-flex justify-content-center align-items-center gap-3 d-none d-lg-flex">
                                @if(session('user'))
                                <!-- Notification Bell -->
                                <div class="notification-wrapper" style="position: relative;">
                                    <a href="{{ route('notifications.index') }}" style="background: linear-gradient(135deg, #1f7d53 0%, #255f38 100%); border: 3px solid #18230f; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; color: white; font-size: 16px; transition: all 0.3s ease; cursor: pointer; box-shadow: 0 4px 15px rgba(24, 35, 15, 0.4); text-decoration: none;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(24, 35, 15, 0.5)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(24, 35, 15, 0.4)'">
                                        <i class="fa fa-bell"></i>
                                        @php
                                            $unreadCount = \App\Models\Notification::where('id_user', session('user')->id)->where('is_read', false)->count();
                                        @endphp
                                        @if($unreadCount > 0)
                                        <span style="position: absolute; top: -5px; right: -5px; background: #dc3545; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold;">{{ $unreadCount }}</span>
                                        @endif
                                    </a>
                                </div>
                                @endif
                                <!-- Search Nav -->
                                <div class="nav-search search-switch" style="background: linear-gradient(135deg, #1f7d53 0%, #255f38 100%); border: 3px solid #18230f; border-radius: 50%; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; color: white; font-size: 16px; transition: all 0.3s ease; cursor: pointer; box-shadow: 0 4px 15px rgba(24, 35, 15, 0.4);" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 6px 20px rgba(24, 35, 15, 0.5)'" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 15px rgba(24, 35, 15, 0.4)'">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>