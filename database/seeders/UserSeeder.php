<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Pastikan Anda mengimpor model User

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Anda bisa mengganti 'password' dengan password lain
            'role' => 'admin', // Menandai user ini sebagai admin
            'email_verified_at' => now(), // Opsional: Tandai email sudah terverifikasi
        ]);

        // User Biasa
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'), // Anda bisa mengganti 'password' dengan password lain
            'role' => 'user', // Menandai user ini sebagai user biasa
            'email_verified_at' => now(), // Opsional: Tandai email sudah terverifikasi
        ]);

        // Opsional: Anda juga bisa menggunakan DB::table('users')->insert() jika tidak ingin menggunakan Eloquent
        /*
        DB::table('users')->insert([
            [
                'name' => 'Admin User DB',
                'email' => 'admindb@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User DB',
                'email' => 'userdb@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        */
    }
}
