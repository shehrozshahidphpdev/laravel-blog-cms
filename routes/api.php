<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('api.')->prefix('v1')->group(function () {
    // guest rourtes 
    Route::post('register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('login', [AuthController::class, 'login'])
        ->name('login');

    Route::get('posts', [PostController::class, 'index'])
        ->name('posts.index');
    // read the post 
    Route::get('posts/{slug}', [PostController::class, 'show'])
        ->name('posts.show');

    // secure routes 
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('posts', [PostController::class, 'store'])
            ->name('posts.store');
        Route::put('posts/{id}', [PostController::class, 'update'])
            ->name('posts.update');
        Route::delete('posts/{id}', [PostController::class, 'destroy'])
            ->name('posts.destroy');
    });
});
