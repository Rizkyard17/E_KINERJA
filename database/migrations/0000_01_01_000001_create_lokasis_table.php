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
        Schema::create('lokasi', function (Blueprint $table) {
            $table->increments('id_lokasi');
            $table->string('nama_lokasi', 45);
            $table->string('alamat_lengkap', 45)->nullable();
            $table->string('kecamatan', 45)->nullable();
            $table->string('kelurahan', 45)->nullable();
            $table->string('kode_pos', 45)->nullable();
            $table->string('koordinat', 45)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
