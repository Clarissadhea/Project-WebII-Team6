<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IdolController;
use App\Http\Controllers\AuthController;

Route::get('/', [IdolController::class, 'index'])->name('home');
Route::get('/idols', [IdolController::class, 'index'])->name('idols.index');
Route::get('/idols/{id}', [IdolController::class, 'show'])->name('idols.show');
Route::post('/idols/{id}/comment', [IdolController::class, 'storeComment'])->name('idols.comment.store');

Route::get('/login', function () { 
    return view('login'); 
})->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post'); 

Route::get('/register', function () { 
    return view('register'); 
})->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post'); 

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/comments/{id}', [IdolController::class, 'destroyComment'])->name('comments.destroy');
});

Route::middleware(['auth', \App\Http\Middleware\CekAdmin::class])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        $idols = \App\Models\Idol::all(); 
        return view('dashboard', compact('idols'));
    })->name('admin.dashboard');

    Route::get('/admin/idols/create', function () { 
        return view('form_idol'); 
    })->name('admin.idols.create');
    
    Route::get('/admin/idols/{id}/edit', [IdolController::class, 'edit'])->name('admin.idols.edit');
    Route::post('/admin/idols', [IdolController::class, 'store'])->name('admin.idols.store');
    Route::put('/admin/idols/{id}', [IdolController::class, 'update'])->name('admin.idols.update');
    Route::delete('/admin/idols/{id}', [IdolController::class, 'destroy'])->name('admin.idols.destroy');
});