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
        Schema::create('rencana_kerja', function (Blueprint $table) {
            $table->increments('id_rencana_kerja');
            $table->unsignedInteger('id_kelompok');
            $table->string('judul_kegiatan', 45);
            $table->date('tanggal_kegiatan')->nullable();
            $table->string('detail_kegiatan', 45)->nullable();
            $table->string('status_kegiatan', 45)->nullable();
            $table->string('evaluasi_kegiatan', 45)->nullable();

            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompok')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_kerjas');
    }
};
