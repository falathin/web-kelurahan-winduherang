<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/berita-sukamulya', function () {
    return view('berita');
})->name('berita');

Route::get('/galeri-sukamulya', function () {
    return view('galeri');
})->name('galeri');

Route::get('/peta-sukamulya', function () {
    return view('peta');
})->name('peta');

Route::get('/wartaWargi-sukamulya', function () {
    return view('wartawar');
})->name('wartaWargi');

Route::get('/pemerintahan-sukamulya', function () {
    return view('pemerintahan');
})->name('pemerintahan');

Route::get('/admin-sukamulya', function () {
    return view('admin.content.dashboard');
})->name('admin.dashboard');