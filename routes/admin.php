<?php

use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return redirect()->route('dashboard');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('blog', BlogController::class);

    
});
