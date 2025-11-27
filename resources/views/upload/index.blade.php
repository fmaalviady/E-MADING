@extends('layouts.app')

@section('title', 'Upload Gambar - Mading Fasya')

@section('content')
<div class="upload-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="upload-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Upload Gambar</h2>
                            <p style="color: #27391c; margin: 0;">Kelola gambar untuk artikel Anda</p>
                        </div>
                        <div>
                            <a href="{{ url('/dashboard/' . session('user')->role) }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <div class="col-lg-6 mb-30">
                <div class="upload-form" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 20px;">Upload Gambar Baru</h4>
                    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-20">
                            <label for="image" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Pilih Gambar</label>
                            <input type="file" id="image" name="image" accept="image/*" required 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                            <small style="color: #27391c; margin-top: 5px; display: block;">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                        </div>
                        <button type="submit" class="btn" style="background: #1f7d53; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                            Upload Gambar
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="upload-gallery" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h4 style="color: #18230f; margin-bottom: 20px;">Gambar Saya ({{ count($images) }})</h4>
                    
                    @if(count($images) > 0)
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-md-6 mb-20">
                                    <div class="image-item" style="border: 2px solid #ecf0f1; border-radius: 8px; overflow: hidden;">
                                        <img src="{{ $image['url'] }}" alt="{{ $image['name'] }}" 
                                             style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="image-info" style="padding: 10px;">
                                            <p style="margin: 0 0 10px 0; font-size: 14px; color: #18230f; word-break: break-all;">{{ $image['name'] }}</p>
                                            <div class="image-actions">
                                                <button onclick="copyToClipboard('{{ $image['url'] }}')" class="btn btn-sm" 
                                                        style="background: #27391c; color: white; padding: 5px 10px; border: none; border-radius: 3px; font-size: 12px; margin-right: 5px;">
                                                    Copy URL
                                                </button>
                                                <form action="{{ route('upload.destroy', $image['name']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" 
                                                            style="background: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; font-size: 12px;"
                                                            onclick="return confirm('Yakin ingin menghapus gambar ini?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state" style="text-align: center; padding: 40px; color: #27391c;">
                            <p>Belum ada gambar yang diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(url) {
    navigator.clipboard.writeText(url).then(function() {
        alert('URL gambar berhasil disalin!');
    });
}
</script>
@endsection