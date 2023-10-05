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
        Schema::create('sub_akun_5', function (Blueprint $table) {
            $table->uuid('id_sub_akun_5')->primary();
            $table->foreignUuid('id_sub_akun_1');
            $table->foreign('id_sub_akun_1')->references('id_sub_akun_1')->on('sub_akun_1');
            $table->foreignUuid('id_sub_akun_2');
            $table->foreign('id_sub_akun_2')->references('id_sub_akun_2')->on('sub_akun_2');
            $table->foreignUuid('id_sub_akun_3');
            $table->foreign('id_sub_akun_3')->references('id_sub_akun_3')->on('sub_akun_3');
            $table->foreignUuid('id_sub_akun_4');
            $table->foreign('id_sub_akun_4')->references('id_sub_akun_4')->on('sub_akun_4');
            $table->string('sub_akun_5');
            $table->foreignUuid('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('akun');
            $table->foreignUuid('id_klasifikasi');
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi_laporan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_akun_5');
    }
};
