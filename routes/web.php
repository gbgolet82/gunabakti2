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
// Route::get('/login', [LoginController::class, 'login2'])->name('login2');
Route::get('/login2/{userId}', [LoginController::class, 'login2'])->name('login2');

Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/select-role/{role}', [DataKaryawanController::class, 'selectRole'])->name('selectRole');

Route::group(['middleware' => 'role:manajer|kasir|owner'], function () {
    // Rute untuk manajer
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('akun');
Route::get('/tambah-klasifikasi-akun', [KlasifikasiLaporanController::class, 'index'])->name('tambah.klasifikasi-akun');
Route::post('/tambah-akun', [DataUsahaController::class, 'simpanAkun'])->name('tambah.akun');
// Route::post('/tambah-sub-akun1', [DataUsahaController::class, 'simpanSubAkun1'])->name('tambah.subakun1');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
Route::post('/tambah-usaha', [DataUsahaController::class, 'simpanData'])->name('tambah.usaha');
Route::post('/edit-usaha', [DataUsahaController::class, 'editData'])->name('edit.usaha');
Route::delete('/hapus-usaha/{id}', [DataUsahaController::class, 'HapusData'])->name('hapus.usaha');
Route::get('/data-karyawan', [DataKaryawanController::class, 'index'])->name('karyawan');
Route::post('/tambah-karyawan', [DataKaryawanController::class, 'simpanData'])->name('tambah.karyawan');
Route::post('/edit-karyawan/{id_karyawan}', [DataKaryawanController::class, 'update'])->name('update.karyawan');
Route::post('/upload-karyawan/{id_karyawan}', [DataKaryawanController::class, 'uploadFoto'])->name('upload.foto');
Route::post('/update-password/{id_karyawan}', [DataKaryawanController::class, 'proses_ubah_password'])->name('update.password');
Route::get('/data-detail-karyawan/{id_karyawan}', [DataKaryawanController::class, 'detail'])->name('detail.karyawan');
Route::get('/data-usaha', [DataUsahaController::class, 'index'])->name('usaha');
});





