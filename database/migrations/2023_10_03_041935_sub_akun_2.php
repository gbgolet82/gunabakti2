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
        Schema::create('sub_akun_2', function (Blueprint $table) {
            $table->uuid('id_sub_akun_2')->primary();
            // $table->foreignUuid('id_akun');
            // $table->foreign('id_akun')->references('id_akun')->on('akun');
            // $table->foreignUuid('id_klasifikasi');
            // $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi_laporan');
            // $table->foreignUuid('id_usaha');
            // $table->foreign('id_usaha')->references('id_usaha')->on('usaha');
            $table->foreignUuid('id_sub_akun_1');
            $table->foreign('id_sub_akun_1')->references('id_sub_akun_1')->on('sub_akun_1');
            $table->string('sub_akun_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_akun_2');
    }
};
