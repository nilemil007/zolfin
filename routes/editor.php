<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','role:editor'])->prefix('editor')->name('editor.')->group(function(){
    Route::get('dashboard', function (){
        return view('backend.dashboard');
    })->name('dashboard');
});
