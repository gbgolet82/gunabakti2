<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\DataUsahaController;
use App\Http\Controllers\KlasifikasiLaporanController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('contents.dashboard');
// });

// Route::get('/klasifikasi_akun', function () {
//     return view('contents.klasifikasi')->name('klasifikasi_akun');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('akun');
Route::get('/tambah-klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('tambah.akun');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
Route::post('/tambah-usaha', [DataUsahaController::class, 'simpanData'])->name('tambah.usaha');
Route::post('/edit-usaha', [DataUsahaController::class, 'editData'])->name('edit.usaha');
Route::delete('/hapus-usaha/{id}', [DataUsahaController::class, 'HapusData'])->name('hapus.usaha');
Route::get('/data-karyawan', [DataKaryawanController::class, 'index'])->name('karyawan');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
