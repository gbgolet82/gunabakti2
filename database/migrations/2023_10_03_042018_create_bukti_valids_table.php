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
        Schema::create('bukti_valid', function (Blueprint $table) {
            $table->uuid('id_bukti_valid')->primary();
            $table->foreignUuid('id_akun');
            $table->foreign('id_akun')->references('id_akun')->on('akun');
            $table->string('bukti_valid_100rb');
            $table->string('bukti_valid_lebih100rb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukti_valids');
    }
};
