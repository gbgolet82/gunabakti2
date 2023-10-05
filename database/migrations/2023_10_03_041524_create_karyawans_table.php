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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->uuid('id_karyawan')->primary(); // Menggunakan UUID sebagai primary key
            $table->foreignUuid('id_usaha'); // Kolom foreign key UUID
            $table->foreign('id_usaha')->references('id_usaha')->on('usaha');
            $table->string('kode');
            $table->string('nama');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto')->nullable();
            $table->enum('kasir', [0, 1])->default(0);
            $table->enum('manajer', [0, 1])->default(0);
            $table->enum('owner', [0, 1])->default(0);
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
