<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\RumahMakanController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');


Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('master-data')->group(function () {
        Route::resource('fasilitas', FasilitasController::class)->parameters(['fasilitas' => 'fasilitas']);

        Route::resource('wisata', WisataController::class)->parameters(['wisata' => 'wisata']);

        Route::resource('rumah_makan', RumahMakanController::class);

        Route::resource('penginapans', PenginapanController::class);

        Route::resource('transportasi', TransportasiController::class);
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});
