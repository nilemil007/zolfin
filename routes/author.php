<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:author'])->prefix('author')->name('author.')->group(function(){
    Route::get('dashboard', function (){
        return view('backend.author.dashboard');
    })->name('dashboard');
});
