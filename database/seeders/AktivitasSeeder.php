<?php

// database/seeders/AktivitasSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aktivitas;
use Carbon\Carbon;

class AktivitasSeeder extends Seeder
{
    public function run()
    {
        Aktivitas::create([
            'judul' => 'Pemeriksaan Kesehatan Lansia',
            'deskripsi' => 'Pemeriksaan kesehatan rutin untuk lansia di Posbindu.',
            'tgl_aktivitas' => Carbon::create('2024', '01', '15'),
            'gambar' => 'images/posbindu1.jpg',
        ]);

        // Tambahkan lebih banyak kegiatan sesuai kebutuhan
    }
}


