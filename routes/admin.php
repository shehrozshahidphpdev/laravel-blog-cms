<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function () {
  // editor + admin routes 
  Route::get('admin/', [AdminController::class, 'index'])
    ->name('admin.dashboard');

  Route::middleware('IsEditor')->group(function () {
    // posts route
    Route::resource('posts', (PostController::class));
  });


  // admin routes only 
  // accounts routes
  Route::middleware('IsAdmin')->group(function () {
    Route::get('accounts', [AccountController::class, 'users'])
      ->name('accounts');

    Route::get('accounts/create', [AccountController::class, 'create'])
      ->name('accounts.create');

    Route::post('account', [AccountController::class, 'store'])
      ->name('accounts.store');

    Route::get('account/edit/{id}', [AccountController::class, 'edit'])
      ->name('accounts.edit');

    Route::put('account/update/{id}', [AccountController::class, 'update'])
      ->name('accounts.update');

    Route::delete('account/{id}', [AccountController::class, 'delete'])
      ->name('accounts.delete');
    // category route
    Route::resource('categories', (CategoryController::class));
    // tag route
    Route::resource('tags', (TagController::class));
  });
});
