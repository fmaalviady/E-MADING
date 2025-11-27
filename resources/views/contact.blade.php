@extends('layouts.app')

@section('title', 'Kontak - Mading Fasya')

@section('content')
<div class="contact-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="text-center">
                        <h2 style="color: #18230f; margin-bottom: 10px;">Hubungi Kami</h2>
                        <p style="color: #27391c; margin: 0;">SMK Bakti Nusantara 666 - Mading Fasya</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-info" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <div class="contact-item text-center" style="padding: 20px;">
                                <div class="contact-icon" style="width: 60px; height: 60px; background: #1f7d53; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-map-marker-alt" style="color: white; font-size: 24px;"></i>
                                </div>
                                <h5 style="color: #18230f; margin-bottom: 10px;">Alamat</h5>
                                <p style="color: #27391c; margin: 0;">Jl. Raya Percobaan No.65<br>Cileunyi Kulon, Kec.Cileunyi, Kabupaten Bandung<br>Jawa Barat 40622</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-30">
                            <div class="contact-item text-center" style="padding: 20px;">
                                <div class="contact-icon" style="width: 60px; height: 60px; background: #27391c; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-phone" style="color: white; font-size: 24px;"></i>
                                </div>
                                <h5 style="color: #18230f; margin-bottom: 10px;">Telepon</h5>
                                <p style="color: #27391c; margin: 0;">(021) 1234-5678<br>+62 812-3456-7890</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-30">
                            <div class="contact-item text-center" style="padding: 20px;">
                                <div class="contact-icon" style="width: 60px; height: 60px; background: #255f38; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-envelope" style="color: white; font-size: 24px;"></i>
                                </div>
                                <h5 style="color: #18230f; margin-bottom: 10px;">Email</h5>
                                <p style="color: #27391c; margin: 0;">info@smkbaktinusantara666.sch.id<br>mading@smkbaktinusantara666.sch.id</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-30">
                            <div class="contact-item text-center" style="padding: 20px;">
                                <div class="contact-icon" style="width: 60px; height: 60px; background: #18230f; border-radius: 50%; margin: 0 auto 15px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-clock" style="color: white; font-size: 24px;"></i>
                                </div>
                                <h5 style="color: #18230f; margin-bottom: 10px;">Jam Operasional</h5>
                                <p style="color: #27391c; margin: 0;">Senin - Jumat: 07:00 - 16:00<br>Sabtu: 07:00 - 12:00</p>
                            </div>
                        </div>
                    </div>
                    
                    <hr style="margin: 30px 0; border: 1px solid #ecf0f1;">
                    
                    <div class="about-school text-center">
                        <h4 style="color: #18230f; margin-bottom: 20px;">Tentang SMK Bakti Nusantara 666</h4>
                        <p style="color: #27391c; line-height: 1.6;">
                            SMK Bakti Nusantara 666 adalah sekolah menengah kejuruan yang berfokus pada pengembangan 
                            teknologi informasi dan komunikasi. Mading Fasya merupakan platform digital yang memfasilitasi 
                            siswa dan guru untuk berbagi artikel, karya, dan informasi sekolah.
                        </p>
                        
                        <div class="social-links mt-30">
                            <h5 style="color: #18230f; margin-bottom: 15px;">Ikuti Kami</h5>
                            <div class="social-icons">
                                <a href="#" style="display: inline-block; width: 40px; height: 40px; background: #1f7d53; color: white; border-radius: 50%; text-align: center; line-height: 40px; margin: 0 5px; text-decoration: none;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" style="display: inline-block; width: 40px; height: 40px; background: #27391c; color: white; border-radius: 50%; text-align: center; line-height: 40px; margin: 0 5px; text-decoration: none;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" style="display: inline-block; width: 40px; height: 40px; background: #255f38; color: white; border-radius: 50%; text-align: center; line-height: 40px; margin: 0 5px; text-decoration: none;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" style="display: inline-block; width: 40px; height: 40px; background: #18230f; color: white; border-radius: 50%; text-align: center; line-height: 40px; margin: 0 5px; text-decoration: none;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection