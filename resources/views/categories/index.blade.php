@extends('layouts.app')

@section('title', 'Kelola Kategori - Mading Fasya')

@section('content')
<div class="dashboard-area pt-50 pb-50" style="background: #1f7d53;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dashboard-header mb-40" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: #18230f; margin-bottom: 10px;">Kelola Kategori</h2>
                            <p style="color: #27391c; margin: 0;">Manajemen kategori artikel mading</p>
                        </div>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn" style="background: #27391c; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px;">← Dashboard</a>
                            <a href="{{ route('categories.create') }}" class="btn" style="background: #255f38; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Tambah Kategori</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="categories-table" style="background: white; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id_kategori }}</td>
                                <td>{{ $category->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm" style="background: #70b2b2; color: white;">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: #e74c3c; color: white;" onclick="return confirm('Yakin hapus kategori ini?')">Hapus</button>
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