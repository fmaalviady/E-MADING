<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        Category::create(['nama_kategori' => 'Pendidikan']);
        Category::create(['nama_kategori' => 'Teknologi']);
        Category::create(['nama_kategori' => 'Ekstrakurikuler']);
        Category::create(['nama_kategori' => 'Olahraga']);
        Category::create(['nama_kategori' => 'Karir']);

        // Create users
        User::create([
            'name' => 'Admin',
            'username' => 'admin@smk.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Pak Budi',
            'username' => 'guru@smk.com',
            'password' => Hash::make('guru123'),
            'role' => 'guru'
        ]);

        User::create([
            'name' => 'Siswa Test',
            'username' => 'siswa@smk.com',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa'
        ]);
    }
}