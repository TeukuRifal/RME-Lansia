<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PatientSeeder extends Seeder
{
    public function run()
    {
        DB::table('patients')->insert([
            [
                'nama_lengkap' => 'Rifal',
                'nik' => '1234567890123456',
                'tanggal_lahir' => '1950-01-01',
                'umur' => 74,
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Kebon Jeruk No. 1, Jakarta',
                'no_hp' => '08123456789',
                'pendidikan_terakhir' => 'SMA',
                'pekerjaan' => 'Pensiunan',
                'status_kawin' => 'Menikah',
                'gol_darah' => 'O',
                'email' => 'john.doe@example.com',
                'riwayat_ptm_keluarga' => 'Diabetes',
                'riwayat_ptm_sendiri' => 'Hipertensi',
                'merokok' => 'Tidak',
                'kurang_aktivitas_fisik' => 'Ya',
                'kurang_sayur_buah' => 'Ya',
                'konsumsi_alkohol' => 'Tidak',
                'stress' => 'Tidak',
                'berat_badan' => 70.0,
                'tinggi_badan' => 170.0,
                'indeks_massa_tubuh' => 24.22,
                'lingkar_perut' => 85.0,
                'tekanan_darah' => '120/80',
                'gula_darah_sewaktu' => '100',
                'kolesterol_total' => '180',
                'masalah_kesehatan' => 'Hipertensi',
                'obat_fasilitas' => 'Obat Hipertensi',
                'tindak_lanjut' => 'Kontrol rutin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Tambahkan data pasien lainnya di sini
        ]);
    }
}
