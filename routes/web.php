<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pelayanan/{slug}', [HomeController::class, 'ministry'])
    ->where('slug', '[a-z-]+')
    ->name('ministry.show');
