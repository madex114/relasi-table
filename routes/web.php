<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\auth_controller;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| 
| Here is where you can register web routes for your application.
|
*/


Route::middleware('auth')->group(function () {
Route::get('/', [KelasController::class, 'deskripsi'])->name('deskripsi.deskripsi');

    // Resource routes untuk CRUD Pasien, Dokter, dan Janji Temu
Route::resource('siswa', SiswaController::class);
Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
    
    // Rute untuk deskripsi
Route::get('deskripsi.deskripsi', [KelasController::class, 'deskripsi'])->name('deskripsi');
Route::get('kelas.index', [KelasController::class, 'index'])->name('index');
Route::get('guru.index', [GuruController::class, 'index'])->name('index');
Route::get('siswa.index', [SiswaController::class, 'index'])->name('index');
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

// Proses login
Route::post('/login-proses', [auth_controller::class, 'login'])->name('loginproccess');

// Logout
Route::post('/logout', [auth_controller::class, 'logout'])->name('logout');
