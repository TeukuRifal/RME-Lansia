<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = Patient::all();

        foreach ($patients as $patient) {
            User::create([
                'name' => $patient->nama_lengkap,
                'email' => null,
                'password' => Hash::make($patient->nik), // Menggunakan nik sebagai password
                'role' => 'patient',
                'nik' => $patient->nik,
            ]);
        }

        // Contoh penambahan data patient baru
        Patient::create([
            'nama_lengkap' => 'Rudi Hermawan',
            'nik' => '3175011505920001',
            'tanggal_lahir' => '1992-05-15',
            'umur' => 32,
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Diponegoro No. 15',
            'no_hp' => '081234567890',
            'pendidikan_terakhir' => 'S1 Ekonomi',
            'pekerjaan' => 'Analyst',
            'status_kawin' => 'Belum Menikah',
            'gol_darah' => 'AB+',
            'email' => 'rudi.hermawan@example.com',
            'riwayat_ptm_keluarga' => 'Tidak ada',
            'riwayat_ptm_sendiri' => 'Tidak ada',
            'merokok' => 'Tidak',
            'kurang_aktivitas_fisik' => 'Tidak',
            'kurang_sayur_buah' => 'Tidak',
            'konsumsi_alkohol' => 'Ya',
            'stress' => 'Tidak',
            'berat_badan' => 70,
            'tinggi_badan' => 178,
            'indeks_massa_tubuh' => 22.1,
            'lingkar_perut' => 85,
            'tekanan_darah' => '120/80',
            'gula_darah_sewaktu' => 95,
            'kolesterol_total' => 185,
            'masalah_kesehatan' => null,
            'obat_fasilitas' => null,
            'tindak_lanjut' => null,
        ]);
    }
}

