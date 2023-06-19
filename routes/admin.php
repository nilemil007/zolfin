<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:admin'])->prefix('admin')->name('admin.')->group(function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');

    // Resource Routes
    Route::resources([
        // Category
        'category' => CategoryController::class,

        // Posts
        'post' => PostController::class,
    ]);
});
