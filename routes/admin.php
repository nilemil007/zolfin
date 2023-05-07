<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:admin'])->prefix('admin')->group(function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
});
