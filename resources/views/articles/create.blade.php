@extends('layouts.app')

@section('title', 'Tulis Artikel - Mading Fasya')

@section('content')
<div class="container pt-50 pb-50">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px; border-left: 5px solid #28a745;">
                <strong><i class="fas fa-check-circle"></i> Berhasil!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            <div class="card" style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <div class="card-header" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 15px 15px 0 0;">
                    <h4 style="margin: 0;">Tulis Artikel Baru</h4>
                </div>
                <div class="card-body" style="padding: 30px;">
                    <form action="{{ url('/articles') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-20">
                            <label>Judul Artikel</label>
                            <input type="text" name="judul" class="form-control" style="padding: 12px; border-radius: 8px;" required>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" style="padding: 12px; border-radius: 8px;" required>
                                <option value="">Pilih Kategori</option>
                                <option value="1">Pendidikan</option>
                                <option value="2">Teknologi</option>
                                <option value="3">Ekstrakurikuler</option>
                                <option value="4">Olahraga</option>
                                <option value="5">Karir</option>
                            </select>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label>Upload Foto</label>
                            <input type="file" name="foto" class="form-control" style="padding: 12px; border-radius: 8px;" accept="image/*">
                        </div>
                        
                        <div class="form-group mb-20">
                            <label>Isi Artikel</label>
                            <textarea name="isi" class="form-control" rows="10" style="padding: 12px; border-radius: 8px;" required></textarea>
                        </div>
                        
                        @if(session('user') && session('user')->role !== 'siswa')
                        <div class="form-group mb-20">
                            <label>Status</label>
                            <select name="status" class="form-control" style="padding: 12px; border-radius: 8px;" required>
                                <option value="draft">Draft</option>
                                <option value="published">Publish</option>
                            </select>
                        </div>
                        @endif
                        
                        <button type="submit" class="btn btn-primary" style="background: linear-gradient(45deg, #229954, #1e7e34); border: none; padding: 12px 30px; border-radius: 8px;">
                            Simpan Artikel
                        </button>
                        
                        @if(session('user') && session('user')->role === 'siswa')
                        <p class="text-muted mt-3" style="font-size: 14px;">
                            <i class="fas fa-info-circle"></i> Artikel Anda akan menunggu persetujuan dari Guru/Admin sebelum dipublikasikan.
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function(){
    @if(session('success'))
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 5000);
    @endif
});
</script>
@endpush
@endsection