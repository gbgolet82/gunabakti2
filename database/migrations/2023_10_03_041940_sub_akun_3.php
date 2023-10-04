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
        Schema::create('sub_akun_3', function (Blueprint $table) {
            $table->increments('id_sub_akun_3');
            $table->unsignedInteger('id_sub_akun_2');
            $table->foreign('id_sub_akun_2')->references('id_sub_akun_2')->on('sub_akun_2');
            $table->string('sub_akun_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_akun_3');
    }
};
