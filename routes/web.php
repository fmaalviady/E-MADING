<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Route untuk halaman kategori statis - hanya untuk user yang sudah login
Route::middleware('auth')->get('/categori', function () {
    return view('categori');
});

// Alias middleware
Route::aliasMiddleware('auth', \App\Http\Middleware\CheckAuth::class);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes dengan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $user = session('user');
        if ($user) {
            return redirect('/dashboard/' . $user->role);
        }
        return redirect('/login');
    })->name('dashboard');
    
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->name('dashboard.admin');
    
    Route::get('/dashboard/guru', function () {
        return view('dashboard.guru');
    })->name('dashboard.guru');
    
    Route::get('/dashboard/siswa', function () {
        return view('dashboard.siswa');
    })->name('dashboard.siswa');
});

// Article routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/create', [ArticleController::class, 'create']);
    Route::post('/articles', [ArticleController::class, 'store']);
});
// Admin and management routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/articles/moderation', [ArticleController::class, 'moderation'])->name('articles.moderation');
    Route::get('/articles/admin', [ArticleController::class, 'admin'])->name('articles.admin');
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::patch('/articles/{id}/publish', [ArticleController::class, 'publish'])->name('articles.publish');
    Route::patch('/articles/{id}/approve', [ArticleController::class, 'approve'])->name('articles.approve');
    Route::patch('/articles/{id}/reject', [ArticleController::class, 'reject'])->name('articles.reject');
});
Route::get('/articles/public', [ArticleController::class, 'public'])->name('articles.public');
Route::get('/articles/{id}/detail', [ArticleController::class, 'show'])->name('articles.show');

// Like routes - accessible without middleware but with controller validation
Route::post('/like/toggle', [LikeController::class, 'toggle']);
Route::post('/articles/{id}/like', [LikeController::class, 'like']);

// Comment routes - accessible without middleware but with controller validation
Route::post('/comments', [CommentController::class, 'store']);

// Comment management routes - hanya untuk admin
Route::middleware('auth')->group(function () {
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Category routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});

// User routes
Route::resource('users', UserController::class);
Route::get('/users-pdf', [UserController::class, 'downloadPdf'])->name('users.pdf');

// Report routes
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

// Profile routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Upload routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/upload', [UploadController::class, 'index'])->name('upload.index');
    Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
    Route::delete('/upload/{filename}', [UploadController::class, 'destroy'])->name('upload.destroy');
});

// Notification routes - hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
});
