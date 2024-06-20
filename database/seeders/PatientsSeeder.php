<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use Faker\Factory as Faker;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Adjust the loop count as needed
        for ($i = 0; $i < 10; $i++) {
            Patients::create([
                'nama_lengkap' => $faker->name,
                'nik' => $faker->numerify('##########'),
                'tanggal_lahir' => $faker->date,
                'umur' => $faker->numberBetween(20, 80),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'pendidikan_terakhir' => $faker->randomElement(['SMA', 'Diploma', 'Sarjana']),
                'pekerjaan' => $faker->jobTitle,
                'status_kawin' => $faker->randomElement(['Belum Menikah', 'Menikah', 'Duda/Janda']),
                'gol_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'email' => $faker->safeEmail,
                'riwayat_ptm_keluarga' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'riwayat_ptm_sendiri' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'merokok' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'kurang_aktivitas_fisik' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'kurang_sayur_buah' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'konsumsi_alkohol' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'stress' => $faker->boolean(30) ? 'Ya' : 'Tidak',
                'berat_badan' => $faker->numberBetween(40, 120),
                'tinggi_badan' => $faker->numberBetween(140, 200),
                'indeks_massa_tubuh' => $faker->randomFloat(2, 15, 40),
                'lingkar_perut' => $faker->numberBetween(60, 120),
                'tekanan_darah' => $faker->randomElement(['Normal', 'Tinggi']),
                'gula_darah_sewaktu' => $faker->randomElement(['Normal', 'Tinggi']),
                'kolesterol_total' => $faker->randomElement(['Normal', 'Tinggi']),
                'masalah_kesehatan' => $faker->sentence,
                'obat_fasilitas' => $faker->sentence,
                'tindak_lanjut' => $faker->sentence,
            ]);
        }
    }
}
