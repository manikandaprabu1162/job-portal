<?php
// routes/web.php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Home page - Job listings
Route::get('/', [JobController::class, 'index'])->name('home');

// Jobs routes
Route::prefix('jobs')->name('jobs.')->group(function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/{id}', [JobController::class, 'show'])->name('show');
});

// Search route (optional - same as jobs.index)
Route::get('/search', [JobController::class, 'index'])->name('search');