<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Halaman auth (login/register)
Route::get('/auth', function () {
    return view('auth.auth');
})->name('auth');

// Proses Auth
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔒 Route yang hanya bisa diakses user login
Route::middleware('auth')->group(function () {

    // Dashboard (opsional)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // nama route diperbaiki
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Pengaturan (opsional)
    Route::get('/pengaturan', [ProfileController::class, 'settings'])->name('pengaturan');
});
// auth pint gallspace
use App\Http\Controllers\PinController;

Route::middleware('auth')->group(function () {
    Route::post('/pins', [PinController::class, 'store'])->name('pins.store');
    Route::post('/pins/{pin}', [PinController::class, 'update'])->name('pins.update');
    });

// route upload
use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
Route::post('posts', [PostController::class, 'store'])->name('posts.store');