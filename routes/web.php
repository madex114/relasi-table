<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AlumniController;
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
Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');

    // Resource routes untuk CRUD Pasien, Dokter, dan Janji Temu
Route::resource('alumni', AlumniController::class);
Route::resource('guru', GuruController::class);
Route::resource('kelas', KelasController::class);
    
    // Rute untuk deskripsi
Route::get('deskripsi.deskripsi', [KelasController::class, 'deskripsi'])->name('deskripsi');
Route::get('kelas.index', [KelasController::class, 'index'])->name('index');
Route::get('guru.index', [GuruController::class, 'index'])->name('index');
Route::get('alumni.index', [AlumniController::class, 'index'])->name('index');
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

Route::post('/login-proses', [auth_controller::class, 'login'])->name('loginproccess');
Route::post('/logout', [auth_controller::class, 'logout'])->name('logout');

Route::get('siswa.create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
