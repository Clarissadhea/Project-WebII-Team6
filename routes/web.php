<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\IdolController;

Route::resource('idols', IdolController::class);
/*
|--------------------------------------------------------------------------
| Web Routes - IdolVerse Kelompok 6
|--------------------------------------------------------------------------
*/

// 1. Halaman Publik / Fans
Route::get('/', function () { 
    return view('welcome'); 
});

Route::get('/idols', function () { 
    return view('welcome'); 
});

Route::get('/idols/jennie', function () { 
    return view('idols.show'); 
});

// 2. Halaman Autentikasi
Route::get('/login', function () { 
    return view('login'); 
});

Route::get('/register', function () { 
    return view('register'); 
});

// 3. Halaman Admin Panel
Route::get('/admin/dashboard', function () { 
    return view('dashboard'); 
});

Route::get('/admin/idols/create', function () { 
    return view('form_idol'); 
});
