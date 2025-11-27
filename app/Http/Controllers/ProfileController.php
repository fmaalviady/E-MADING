<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = session('user');
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = session('user');
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = session('user');
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $userData = \App\Models\User::find($user->id);
        
        // Update basic info
        $userData->name = $request->name;
        if ($request->email) {
            $userData->email = $request->email;
        }
        
        // Update profile photo
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($userData->profile_photo && file_exists(public_path('uploads/profiles/' . $userData->profile_photo))) {
                unlink(public_path('uploads/profiles/' . $userData->profile_photo));
            }
            
            $file = $request->file('profile_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profiles'), $filename);
            $userData->profile_photo = $filename;
        }
        
        // Update password if provided
        if ($request->password) {
            if (!$request->current_password || !Hash::check($request->current_password, $userData->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak benar']);
            }
            $userData->password = Hash::make($request->password);
        }
        
        $userData->save();
        
        // Update session
        session(['user' => $userData]);
        
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }
}