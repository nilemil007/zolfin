<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function(){
    // Dashboard
    Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
});
