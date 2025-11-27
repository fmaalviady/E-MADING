<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user')) {
            if ($request->is('categories*') || $request->is('categori')) {
                return redirect('/login')->with('error', 'Anda harus login terlebih dahulu untuk mengakses fitur kategori.');
            }
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Blokir akses siswa ke fitur kategori
        if (($request->is('categories*') || $request->is('categori')) && session('user')->role === 'siswa') {
            return redirect('/dashboard')->with('error', 'Akses ditolak. Fitur kategori hanya untuk admin dan guru.');
        }

        return $next($request);
    }
}