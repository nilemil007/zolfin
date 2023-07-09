<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;

Route::middleware(['auth','verified','role:admin'])->prefix('admin')->name('admin.')->group(function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');

    // Resource Routes
    Route::resources([
        // Category
        'category' => CategoryController::class,

        // Post
        'post' => PostController::class,

        // User
        'user' => UserController::class,

        // Permission
        'permission' => PermissionController::class,

        // Role
        'role' => RoleController::class,
    ]);
});
