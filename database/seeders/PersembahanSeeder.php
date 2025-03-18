<?php

namespace Database\Seeders;

use App\Models\Admin\Persembahan;
use Illuminate\Database\Seeder;

class PersembahanSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        Persembahan::create([
            'gambar'=> '8ggHqVbTCa6OJDPEOWGCJQPJs3JH1Ayw2Zchzbjb.png', // Isi dengan contoh nama file
            'deskripsi' => 'Persembahan minggu pertama',
            'sidang' => 'Sidang Pagi',
            'tanggal' => now(), // Bisa gunakan `now()` untuk tanggal saat ini
            'is_featured' => 1
        ]);
    }
}
