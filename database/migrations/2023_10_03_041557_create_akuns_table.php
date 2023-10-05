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
        Schema::create('akun', function (Blueprint $table) {
            $table->uuid('id_akun')->primary();
            $table->foreignUuid('id_klasifikasi'); // Sesuai dengan kolom yang ada pada tabel akun
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi_laporan');
            $table->foreignUuid('id_usaha');
            $table->foreign('id_usaha')->references('id_usaha')->on('usaha');
            $table->string('akun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};
