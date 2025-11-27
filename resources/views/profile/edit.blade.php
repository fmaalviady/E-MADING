@extends('layouts.app')

@section('title', 'Edit Profil - Mading Fasya')

@section('content')
<div class="profile-edit-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Edit Profil</h2>
                            <p style="color: #27391c; margin: 0;">Perbarui informasi profil Anda</p>
                        </div>
                        <div>
                            <a href="{{ route('profile.show') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
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
            <div class="col-lg-8 mx-auto">
                <div class="profile-form" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-20 text-center">
                            <div style="margin-bottom: 15px;">
                                <img src="{{ $user->profile_photo ? asset('uploads/profiles/' . $user->profile_photo) : asset('assets/img/gallery/default-avatar.png') }}" 
                                     alt="Profile Photo" 
                                     id="preview-photo"
                                     style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid #1f7d53; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                            </div>
                            <label for="profile_photo" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Foto Profil</label>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*" 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px;">
                            <small style="color: #666; display: block; margin-top: 5px;">Format: JPG, PNG, GIF (Max: 2MB)</small>
                        </div>
                        
                        <div class="form-group mb-20">
                            <label for="name" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Nama Lengkap</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                        </div>
                        
                        <div class="form-group mb-20">
                            <label for="email" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Email (Opsional)</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                        </div>
                        
                        <hr style="margin: 30px 0; border: 1px solid #ecf0f1;">
                        
                        <h5 style="color: #18230f; margin-bottom: 20px;">Ubah Password (Opsional)</h5>
                        
                        <div class="form-group mb-20">
                            <label for="current_password" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Password Saat Ini</label>
                            <input type="password" id="current_password" name="current_password" 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                        </div>
                        
                        <div class="form-group mb-20">
                            <label for="password" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Password Baru</label>
                            <input type="password" id="password" name="password" 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                        </div>
                        
                        <div class="form-group mb-30">
                            <label for="password_confirmation" style="color: #18230f; font-weight: bold; margin-bottom: 8px; display: block;">Konfirmasi Password Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   style="width: 100%; padding: 12px; border: 2px solid #ecf0f1; border-radius: 5px; font-size: 16px;">
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn" style="background: #1f7d53; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('profile_photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-photo').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection