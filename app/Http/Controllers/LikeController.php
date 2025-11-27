<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $user = session('user');
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $userId = $user->id;
        $articleId = $request->id_artikel;

        $like = Like::where('id_artikel', $articleId)
                   ->where('id_user', $userId)
                   ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'id_artikel' => $articleId,
                'id_user' => $userId
            ]);
            $liked = true;
        }

        $likeCount = Like::where('id_artikel', $articleId)->count();

        return response()->json([
            'liked' => $liked,
            'count' => $likeCount
        ]);
    }
    
    public function like($id)
    {
        $user = session('user');
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $userId = $user->id;
        $articleId = $id;

        $like = Like::where('id_artikel', $articleId)
                   ->where('id_user', $userId)
                   ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create([
                'id_artikel' => $articleId,
                'id_user' => $userId
            ]);
            $liked = true;
        }

        $likeCount = Like::where('id_artikel', $articleId)->count();

        return response()->json([
            'success' => true,
            'liked' => $liked,
            'count' => $likeCount
        ]);
    }
}