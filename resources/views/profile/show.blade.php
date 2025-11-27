@extends('layouts.app')

@section('title', 'Profil Saya - Mading Fasya')

@section('content')
<div class="profile-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profile-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Profil Saya</h2>
                            <p style="color: #27391c; margin: 0;">Kelola informasi profil Anda</p>
                        </div>
                        <div>
                            <a href="{{ url('/dashboard/' . $user->role) }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">← Kembali</a>
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
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="profile-card" style="background: white; padding: 40px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="profile-info mb-30">
                        <div class="row">
                            <div class="col-md-4 text-center mb-30">
                                @if($user->profile_photo)
                                    <img src="{{ asset('uploads/profiles/' . $user->profile_photo) }}" alt="Profile Photo" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid #1f7d53; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                                @else
                                    <div class="profile-avatar" style="width: 150px; height: 150px; background: #1f7d53; border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; border: 4px solid #18230f;">
                                        <span style="color: white; font-size: 60px; font-weight: bold;">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4 style="color: #18230f; margin-bottom: 15px;">{{ $user->name }}</h4>
                                <p style="color: #27391c; margin-bottom: 10px;"><strong>Email:</strong> {{ $user->email }}</p>
                                <p style="color: #27391c; margin-bottom: 10px;"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                                <p style="color: #27391c; margin-bottom: 20px;"><strong>Bergabung:</strong> {{ $user->created_at->format('d M Y') }}</p>
                                <a href="{{ route('profile.edit') }}" class="btn" style="background: #1f7d53; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection