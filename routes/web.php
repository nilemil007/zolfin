<?php

use App\Http\Controllers\Zolfin\ZolfinController;
use Illuminate\Support\Facades\Route;

Route::controller(ZolfinController::class)->group(function (){
    // Homepage route
    Route::get('/', 'zolfin')->name('home');

    // Blog page route
    Route::get('/blog', 'blog')->name('blog');

    // Posts by category
    Route::get('posts-by-category/{category}', 'postsByCategory')->name('posts.by.category');
});

require __DIR__.'/auth.php';