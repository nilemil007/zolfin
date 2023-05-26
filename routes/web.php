<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Zolfin\ZolfinController;
use Illuminate\Support\Facades\Route;

Route::controller(ZolfinController::class)->group(function (){
    // Homepage route
    Route::get('/', 'zolfin')->name('home');

    // Blog page route
    Route::get('/blog', 'blog')->name('blog');
});

require __DIR__.'/auth.php';
