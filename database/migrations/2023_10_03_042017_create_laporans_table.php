<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->unsignedInteger('id_usaha');
            $table->foreign('id_usaha')->references('id_usaha')->on('usaha');
            $table->unsignedInteger('id_kasir');
            $table->foreign('id_kasir')->references('id_karyawan')->on('karyawan');
            $table->unsignedInteger('id_manager');
            $table->foreign('id_manager')->references('id_karyawan')->on('karyawan');
            $table->unsignedInteger('id_klasifikasi');
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi_laporan');
            $table->unsignedInteger('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('akun');
            $table->unsignedInteger('id_sub_akun_1');
            $table->foreign('id_sub_akun_1')->references('id_sub_akun_1')->on('sub_akun_1');
            $table->unsignedInteger('id_sub_akun_2');
            $table->foreign('id_sub_akun_2')->references('id_sub_akun_2')->on('sub_akun_2');
            $table->unsignedInteger('id_sub_akun_3');
            $table->foreign('id_sub_akun_3')->references('id_sub_akun_3')->on('sub_akun_3');
            $table->unsignedInteger('id_sub_akun_4');
            $table->foreign('id_sub_akun_4')->references('id_sub_akun_4')->on('sub_akun_4');
            $table->unsignedInteger('id_sub_akun_5');
            $table->foreign('id_sub_akun_5')->references('id_sub_akun_5')->on('sub_akun_5');
            $table->string('kode_laporan');
            $table->date('tanggal_laporan');
            $table->string('nominal');
            $table->string('gambar_bukti');
            $table->string('status_cek');
            $table->date('tanggal_cek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
