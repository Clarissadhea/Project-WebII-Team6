<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IdolController;

Route::get('/', [IdolController::class, 'index'])->name('home');
Route::get('/idols', [IdolController::class, 'index'])->name('idols.index');
Route::get('/idols/{id}', [IdolController::class, 'show'])->name('idols.show');
Route::post('/idols/{id}/comment', [IdolController::class, 'storeComment'])->name('idols.comment.store');

Route::get('/login', function () { 
    return view('login'); 
});

Route::get('/register', function () { 
    return view('register'); 
});

Route::get('/admin/dashboard', [IdolController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/idols/create', function () { 
    return view('form_idol'); 
})->name('admin.idols.create');

Route::post('/admin/idols', [IdolController::class, 'store'])->name('admin.idols.store');
Route::put('/admin/idols/{id}', [IdolController::class, 'update'])->name('admin.idols.update');
Route::delete('/admin/idols/{id}', [IdolController::class, 'destroy'])->name('admin.idols.destroy');