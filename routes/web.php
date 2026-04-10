<?php

use Illuminate\Support\Facades\Route;

// Rute Home
Route::get('/', function () {
    return view('welcome');
});

// Rute Kontak 
Route::get('/kontak', function () {
    return view('contact');
});

// LATIHAN: Rute Profil
Route::get('/profil', function () {
    return view('profil');
});

// LATIHAN: Rute Katalog (AmikomEventHub)
Route::get('/katalog', function () {
    return view('katalog');
});

// LATIHAN: Rute Bantuan (FAQ)
Route::get('/bantuan', function () {
    return view('bantuan');
});