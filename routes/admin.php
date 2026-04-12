<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->middleware('auth')->group(function () {
  // editor + admin routes 
  Route::get('admin/', [AdminController::class, 'index'])
    ->name('admin.dashboard');

  // admin routes only 
  // accounts routes
  Route::prefix('admin/')->middleware('IsAdmin')->group(function () {
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

    Route::resource('categories', (CategoryController::class));
  });
});
