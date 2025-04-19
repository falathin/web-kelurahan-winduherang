<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/berita-winduherang', function () {
    return view('berita');
})->name('berita');

Route::get('/galeri-winduherang', function () {
    return view('galeri');
})->name('galeri');

Route::get('/peta-winduherang', function () {
    return view('peta');
})->name('peta');

Route::get('/wartaWargi-winduherang', function () {
    return view('wartawar');
})->name('wartaWargi');

Route::get('/pemerintahan-winduherang', function () {
    return view('pemerintahan');
})->name('pemerintahan');

Route::get('/dashboard', function () {
    return view('admin.content.dashboard');
})->name('admin.dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
