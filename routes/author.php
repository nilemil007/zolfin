<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:author'])->prefix('author')->name('author.')->group(function(){
    Route::get('dashboard', function (){
        return view('backend.dashboard');
    })->name('dashboard');
});
