@extends('layouts.app')

@section('title', 'Tentang Mading Fasya - SMK Bakti Nusantara 666')

@section('content')
<!-- Hero Section -->
<div class="hero-section" style="background: linear-gradient(135deg, #18230f 0%, #27391c 100%); padding: 80px 0; color: white; text-align: center;">
    <div class="container">
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px;">Mading Fasya</h1>
        <p style="font-size: 1.2rem; opacity: 0.9;">Platform Digital SMK Bakti Nusantara 666</p>
    </div>
</div>

<!-- About Area Start -->
<section class="about-area pt-80 pb-80" style="background: #1f7d53;">
    <div class="container">
@        <div class="row">
            <div class="col-lg-8">
                <div class="about-content" style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <div class="section-tittle mb-40">
                        <h2 style="color: #18230f; border-bottom: 3px solid #255f38; padding-bottom: 10px; display: inline-block;">Tentang Mading Fasya</h2>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: #555; margin-bottom: 30px;">Mading Fasya adalah platform digital majalah dinding SMK Bakti Nusantara 666 yang hadir untuk menyajikan informasi terkini seputar kegiatan sekolah, prestasi siswa, dan berbagai artikel edukatif.</p>
                    
                    <div class="about-details mt-40">
                        <div style="background: linear-gradient(45deg, #255f38, #1f7d53); padding: 30px; border-radius: 10px; margin-bottom: 30px; color: white;">
                            <h4 style="color: white; margin-bottom: 15px; font-weight: bold;"><i class="fas fa-eye" style="margin-right: 10px;"></i>Visi Kami</h4>
                            <p style="margin: 0; font-size: 1.05rem; color: white; font-weight: 500;">Menjadi media informasi terdepan yang menginspirasi dan memotivasi seluruh civitas akademika SMK Bakti Nusantara 666 dalam mencapai prestasi terbaik.</p>
                        </div>
                        
                        <div style="background: linear-gradient(45deg, #27391c, #255f38); padding: 30px; border-radius: 10px; color: white; border: 2px solid #1f7d53;">
                            <h4 style="color: white; margin-bottom: 20px; font-weight: bold;"><i class="fas fa-bullseye" style="margin-right: 10px;"></i>Misi Kami</h4>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li style="margin-bottom: 12px; padding-left: 25px; position: relative;"><i class="fas fa-check-circle" style="position: absolute; left: 0; top: 2px; color: #1f7d53;"></i>Menyediakan informasi aktual dan terpercaya tentang kegiatan sekolah</li>
                                <li style="margin-bottom: 12px; padding-left: 25px; position: relative;"><i class="fas fa-check-circle" style="position: absolute; left: 0; top: 2px; color: #1f7d53;"></i>Memberikan wadah bagi siswa untuk mengekspresikan kreativitas melalui tulisan</li>
                                <li style="margin-bottom: 12px; padding-left: 25px; position: relative;"><i class="fas fa-check-circle" style="position: absolute; left: 0; top: 2px; color: #1f7d53;"></i>Membangun komunikasi yang efektif antara sekolah, siswa, dan orang tua</li>
                                <li style="margin-bottom: 0; padding-left: 25px; position: relative;"><i class="fas fa-check-circle" style="position: absolute; left: 0; top: 2px; color: #1f7d53;"></i>Mempromosikan prestasi dan pencapaian siswa SMK Bakti Nusantara 666</li>
                            </ul>
                        </div>
                    </div>

                    <div class="school-info mt-40" style="background: linear-gradient(45deg, #18230f, #27391c); padding: 30px; border-radius: 10px; color: white;">
                        <h4 style="color: white; margin-bottom: 15px;"><i class="fas fa-school" style="margin-right: 10px;"></i>SMK Bakti Nusantara 666</h4>
                        <p style="margin: 0; font-size: 1.05rem;">SMK Bakti Nusantara 666 adalah sekolah menengah kejuruan yang berkomitmen menghasilkan lulusan berkualitas dan siap kerja. Dengan berbagai program keahlian yang relevan dengan kebutuhan industri, sekolah ini terus berinovasi dalam memberikan pendidikan terbaik.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="about-sidebar">
                    <div class="sidebar-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); margin-bottom: 30px;">
                        <h5 style="color: #18230f; margin-bottom: 20px; font-size: 1.3rem;"><i class="fas fa-info-circle" style="color: #255f38; margin-right: 10px;"></i>Informasi Sekolah</h5>
                        <ul class="school-details" style="list-style: none; padding: 0;">
                            <li style="padding: 10px 0; border-bottom: 1px solid #255f38;"><strong style="color: #18230f;">Nama:</strong> <span style="color: #27391c;">SMK Bakti Nusantara 666</span></li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #255f38;"><strong style="color: #18230f;">Status:</strong> <span style="color: #27391c;">Sekolah Swasta</span></li>
                            <li style="padding: 10px 0; border-bottom: 1px solid #255f38;"><strong style="color: #18230f;">Akreditasi:</strong> <span style="background: #255f38; color: white; padding: 3px 8px; border-radius: 5px; font-size: 0.9rem;">A</span></li>
                            <li style="padding: 10px 0;"><strong style="color: #18230f;">Kepala Sekolah:</strong> <span style="color: #27391c;">DENI DANIS SUARA S.T.,M.Kom</span></li>
                        </ul>
                    </div>
                    
                    <div class="sidebar-card" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                        <h5 style="color: #18230f; margin-bottom: 20px; font-size: 1.3rem;"><i class="fas fa-graduation-cap" style="color: #255f38; margin-right: 10px;"></i>Program Keahlian</h5>
                        <ul style="list-style: none; padding: 0;">
                            <li style="background: linear-gradient(45deg, #18230f, #27391c); color: white; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; font-weight: 500;"><i class="fas fa-code" style="margin-right: 8px; color: #1f7d53;"></i>Pengembang Perangkat Lunak Dan Gim</li>
                            <li style="background: linear-gradient(45deg, #27391c, #255f38); color: white; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; font-weight: 500;"><i class="fas fa-film" style="margin-right: 8px; color: #e5e9c5;"></i>Animasi</li>
                            <li style="background: linear-gradient(45deg, #255f38, #1f7d53); color: white; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; font-weight: 500;"><i class="fas fa-calculator" style="margin-right: 8px; color: #e5e9c5;"></i>Akuntansi</li>
                            <li style="background: linear-gradient(45deg, #1f7d53, #255f38); color: white; padding: 12px 15px; margin-bottom: 10px; border-radius: 8px; font-weight: 500;"><i class="fas fa-paint-brush" style="margin-right: 8px; color: #e5e9c5;"></i>Desain Komunikasi Visual</li>
                            <li style="background: linear-gradient(45deg, #27391c, #1f7d53); color: white; padding: 12px 15px; border-radius: 8px; font-weight: 500;"><i class="fas fa-bullhorn" style="margin-right: 8px; color: #e5e9c5;"></i>Pemasaran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area End -->
@endsection