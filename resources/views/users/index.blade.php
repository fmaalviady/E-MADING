@extends('layouts.app')

@section('title', 'Kelola Pengguna - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Kelola Pengguna</h2>
                            <p style="color: #27391c; margin: 0;">Manajemen pengguna SMK Bakti Nusantara 666</p>
                        </div>
                        <div>
                            <a href="{{ route('users.pdf') }}" class="btn" style="background: #e74c3c; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </a>
                            <a href="{{ route('users.create') }}" class="btn" style="background: #255f38; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Tambah Pengguna</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="users-table" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td><span class="badge" style="background: #255f38; color: white; padding: 5px 10px;">{{ ucfirst($user->role) }}</span></td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm" style="background: #70b2b2; color: white;">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: #e74c3c; color: white;" onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection