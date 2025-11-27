<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public static function log($aksi, $user_id = null)
    {
        $user = $user_id ? $user_id : (session('user') ? session('user')->id : null);
        
        if ($user) {
            DB::table('log_aktivitas')->insert([
                'id_user' => $user,
                'aksi' => $aksi,
                'waktu' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}