<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil artikel terbaru yang sudah dipublish
        $latestArticles = Article::with(['user', 'category', 'likes'])
                                ->where('status', 'published')
                                ->orderBy('tanggal', 'desc')
                                ->limit(10)
                                ->get();

        // Ambil artikel berdasarkan kategori untuk tabs
        $categories = Category::all();
        $articlesByCategory = [];
        
        foreach ($categories as $category) {
            $articlesByCategory[$category->id] = Article::with(['user', 'category', 'likes'])
                                                      ->where('status', 'published')
                                                      ->where('id_kategori', $category->id)
                                                      ->orderBy('tanggal', 'desc')
                                                      ->limit(5)
                                                      ->get();
        }

        // Ambil artikel trending (berdasarkan jumlah likes)
        $trendingArticles = Article::with(['user', 'category', 'likes'])
                                  ->where('status', 'published')
                                  ->withCount('likes')
                                  ->orderBy('likes_count', 'desc')
                                  ->limit(5)
                                  ->get();

        return view('welcome', compact('latestArticles', 'articlesByCategory', 'categories', 'trendingArticles'));
    }
}