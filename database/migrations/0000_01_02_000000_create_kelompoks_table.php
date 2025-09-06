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
        Schema::create('kelompok', function (Blueprint $table) {
            $table->increments('id_kelompok');
            $table->integer('id_lokasi')->unsigned()->nullable();
            $table->string('nama_kelompok', 45);

            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompoks');
    }
};
