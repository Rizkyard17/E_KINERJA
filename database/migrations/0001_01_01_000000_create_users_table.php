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
        // Buat tabel profesi dan kelompok jika belum ada
        // (Pastikan ini sudah dibuat, atau tambahkan di migration terpisah)
        // Untuk contoh, kita asumsikan sudah ada.

        Schema::create('users', function (Blueprint $table) {
            // Gunakan bigIncrements() agar kompatibel dengan Laravel 8+
            $table->id('id_user'); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->unsignedInteger('id_profesi')->nullable();
            $table->unsignedInteger('id_kelompok')->nullable();
            $table->string('name')->nullable(); // username login
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('role', 45)->default('user');
            $table->string('posisi', 45)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nik', 16)->nullable()->unique()->index();
            $table->string('no_hp', 15)->nullable();
            $table->string('status', 45)->nullable(); // misal: aktif, nonaktif
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
            $table->timestamps(); // created_at & updated_at

            // Foreign Keys
            $table->foreign('id_profesi')->references('id_profesi')->on('profesi')->onDelete('set null');
            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompok')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255)->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};