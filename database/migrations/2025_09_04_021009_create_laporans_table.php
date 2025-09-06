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
            $table->unsignedBigInteger('id_user');
            $table->string('judul_laporan', 45);
            $table->string('foto_path', 45)->nullable();
            $table->date('tanggal_laporan')->nullable();
            $table->string('detail_laporan', 45)->nullable();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
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
