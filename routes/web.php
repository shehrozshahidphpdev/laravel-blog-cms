<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// user side routes 
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashBoardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('posts/{category?}', [HomeController::class, 'posts'])
    ->name('all-posts');

Route::get('post/{id}', [HomeController::class, 'readPost'])
    ->name('read-post');

// comments routes
Route::middleware(['auth'])->group(function () {
    Route::post('comments', [CommentController::class, 'store'])
        ->name('comments.store');
    Route::get('comments', [DashBoardController::class, 'comments'])
        ->name('comments.index')->withoutMiddleware(['auth']);
    Route::put('comments/status/{id}', [CommentController::class, 'update'])
        ->name('comments.status');
    Route::delete('comments/{id}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
