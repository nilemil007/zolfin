<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','role:editor'])->prefix('editor')->name('editor.')->group(function(){
    Route::get('dashboard', function (){
        return view('backend.editor.dashboard');
    })->name('dashboard');
});
