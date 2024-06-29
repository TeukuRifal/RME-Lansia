<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = [
            [
                'nama_lengkap' => 'John Doe',
                'nik' => '1234567890123456',
                'tanggal_lahir' => '1970-01-01',
                'umur' => 54,
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Contoh No. 1',
                'no_hp' => '08123456789',
                'pendidikan_terakhir' => 'SMA',
                'pekerjaan' => 'PNS',
                'status_kawin' => 'Menikah',
                'gol_darah' => 'O',
                'email' => 'johndoe@example.com',
                'riwayat_ptm_keluarga' => 'Diabetes',
                'riwayat_ptm_sendiri' => 'Hipertensi',
                'merokok' => 'Tidak',
                'kurang_aktivitas_fisik' => 'Ya',
                'kurang_sayur_buah' => 'Ya',
                'konsumsi_alkohol' => 'Tidak',
                'stress' => 'Ya',
                'berat_badan' => 70,
                'tinggi_badan' => 170,
                'indeks_massa_tubuh' => 24.2,
                'lingkar_perut' => 90,
                'tekanan_darah' => '120/80',
                'gula_darah_sewaktu' => 'Normal',
                'kolesterol_total' => 'Normal',
                'masalah_kesehatan' => 'Tidak ada',
                'obat_fasilitas' => 'Tidak ada',
                'tindak_lanjut' => 'Check-up rutin',
            ],
            // Tambahkan data pasien lainnya jika perlu
        ];

        foreach ($patients as $data) {
            // Buat pengguna untuk pasien
            $user = User::create([
                'name' => $data['nama_lengkap'],
                'username' => $data['nik'],
                'email' => $data['email'],
                'password' => bcrypt('password'),
                'role' => 'patient',
            ]);

            // Buat data pasien dan hubungkan dengan pengguna
            $patient = new Patient($data);
            $patient->user()->associate($user);
            $patient->save();
        }
    }
}
