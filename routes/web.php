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
Route::post('/', [LoginController::class, 'login'])->name('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('akun');
Route::get('/tambah-klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('tambah.akun');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
Route::post('/tambah-usaha', [DataUsahaController::class, 'simpanData'])->name('tambah.usaha');
Route::get('/data-karyawan', [DataKaryawanController::class, 'index'])->name('karyawan');
Route::post('/tambah-karyawan', [DataKaryawanController::class, 'simpanData'])->name('tambah.karyawan');
Route::post('/edit-karyawan/{id_karyawan}', [DataKaryawanController::class, 'update'])->name('update.karyawan');
Route::post('/upload-karyawan/{id_karyawan}', [DataKaryawanController::class, 'uploadFoto'])->name('upload.foto');
Route::post('/update-password/{id_karyawan}', [DataKaryawanController::class, 'proses_ubah_password'])->name('update.password');
Route::get('/data-detail-karyawan/{id_karyawan}', [DataKaryawanController::class, 'detail'])->name('detail.karyawan');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
