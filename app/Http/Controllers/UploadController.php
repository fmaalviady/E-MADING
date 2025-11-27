<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $user = session('user');
        $images = [];
        
        // Get user's uploaded images
        $userFolder = 'uploads/user_' . $user->id;
        if (Storage::disk('public')->exists($userFolder)) {
            $files = Storage::disk('public')->files($userFolder);
            $images = array_map(function($file) {
                return [
                    'name' => basename($file),
                    'url' => Storage::url($file),
                    'path' => $file
                ];
            }, $files);
        }
        
        return view('upload.index', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = session('user');
        $userFolder = 'uploads/user_' . $user->id;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs($userFolder, $filename, 'public');
            
            return redirect()->route('upload.index')->with('success', 'Gambar berhasil diupload');
        }
        
        return back()->withErrors(['image' => 'Gagal mengupload gambar']);
    }

    public function destroy($filename)
    {
        $user = session('user');
        $filePath = 'uploads/user_' . $user->id . '/' . $filename;
        
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return redirect()->route('upload.index')->with('success', 'Gambar berhasil dihapus');
        }
        
        return back()->withErrors(['error' => 'Gambar tidak ditemukan']);
    }
}