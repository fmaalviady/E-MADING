<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\LogController;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:siswa,guru'
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        session(['user' => $user]);
        LogController::log('Register sebagai ' . $user->role, $user->id);

        switch ($user->role) {
            case 'guru':
                return redirect('/dashboard/guru');
            case 'siswa':
                return redirect('/dashboard/siswa');
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user' => $user]);
            LogController::log('Login sebagai ' . $user->role, $user->id);
            
            switch ($user->role) {
                case 'admin':
                    return redirect('/dashboard/admin');
                case 'guru':
                    return redirect('/dashboard/guru');
                case 'siswa':
                    return redirect('/dashboard/siswa');
            }
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        $user = session('user');
        if ($user) {
            LogController::log('Logout', $user->id);
        }
        session()->forget('user');
        return redirect('/');
    }
}