<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// ===== Halaman Publik =====
Route::get('/', function () {
    return view('portfolio.home');
})->name('home');

Route::get('/about', function () {
    return view('portfolio.about');
})->name('about');

Route::get('/contact', function () {
    return view('portfolio.contact');
})->name('contact');

// Halaman portfolio projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
