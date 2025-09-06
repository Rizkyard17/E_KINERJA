<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'nik' => 1234567891012131,
            'role' => 'admin',
            'posisi' => 'admin',
            'no_hp' => '081234567890',
            'status' => 'aktif'
        ]);

        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => 'superadmin123',
            'nik' => 1213141516171819,
            'role' => 'superadmin',
            'posisi' => 'superadmin',
            'status' => 'aktif'
        ]);
    }
}
