<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
  Route::get('admin/', [AdminController::class, 'index'])
    ->name('admin.dashboard');
  Route::middleware('editor')->group(function () {});

  Route::middleware('admin')->group(function () {
    Route::get('accounts', [AdminController::class, 'users']);
  });
});
