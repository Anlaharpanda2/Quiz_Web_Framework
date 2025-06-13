<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan direktori storage/berita tersedia
        Storage::disk('public')->makeDirectory('berita');

        // Buat user dummy jika belum ada
        $user = User::first() ?? User::factory()->create([
            'name' => 'Admin Seeder',
            'email' => 'admin@seeder.com',
        ]);

        // Loop berita palsu
        for ($i = 1; $i <= 10; $i++) {
            Berita::create([
                'judul' => "Judul Berita ke-$i",
                'konten' => fake()->paragraphs(3, true),
                'foto' => 'berita/default.jpg', // file dummy (upload manual)
                'user_id' => $user->id,
            ]);
        }
    }
}
