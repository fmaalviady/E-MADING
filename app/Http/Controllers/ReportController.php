<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        
        $articlesByCategory = Category::withCount('articles')->get();
        $recentArticles = Article::with('category')->latest()->take(10)->get();
        $recentActivities = DB::table('log_aktivitas')
                             ->join('users', 'log_aktivitas.id_user', '=', 'users.id')
                             ->select('log_aktivitas.*', 'users.name')
                             ->orderBy('waktu', 'desc')
                             ->limit(10)
                             ->get();
        
        return view('reports.index', compact(
            'totalArticles', 'publishedArticles', 'draftArticles', 
            'totalUsers', 'totalCategories', 'articlesByCategory', 'recentArticles', 'recentActivities'
        ));
    }
}