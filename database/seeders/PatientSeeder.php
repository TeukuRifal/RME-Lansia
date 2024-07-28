<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\PatientRecord;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $patients = [
            [
                'nama_lengkap' => 'Farhan Alghifari',
                'nik' => '1234567890123456',
                'tanggal_lahir' => '1970-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Islam',
                'alamat' => 'Jl. Contoh No. 1',
                'no_hp' => '08123456789',
                'pendidikan_terakhir' => 'SMA',
                'pekerjaan' => 'PNS',
                'status_kawin' => 'Menikah',
                'gol_darah' => 'O',
                'email' => 'johndoe@example.com',
            ],
            // Tambahkan data pasien lainnya jika perlu
        ];

        foreach ($patients as $data) {
            // Buat pengguna untuk pasien
            $user = User::create([
                'name' => $data['nama_lengkap'],
                'username' => $data['nik'],
                'email' => $data['email'],
                'password' => bcrypt('password'), // Ganti dengan password aman
                'role' => 'patient',
            ]);

            // Buat data pasien dan hubungkan dengan pengguna
            $patient = Patient::create([
                'user_id' => $user->id,
                'nama_lengkap' => $data['nama_lengkap'],
                'nik' => $data['nik'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'agama' => $data['agama'],
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
                'pendidikan_terakhir' => $data['pendidikan_terakhir'],
                'pekerjaan' => $data['pekerjaan'],
                'status_kawin' => $data['status_kawin'],
                'gol_darah' => $data['gol_darah'],
                'email' => $data['email'],
            ]);

            // Buat data catatan pasien
            $patientRecords = [
                [
                    'record_date' => now(),
                    'riwayat_ptm_keluarga' => 'Diabetes',
                    'riwayat_ptm_sendiri' => 'Hipertensi',
                    'merokok' => 'Tidak',
                    'kurang_aktivitas_fisik' => 'Ya',
                    'kurang_sayur_buah' => 'Ya',
                    'konsumsi_alkohol' => 'Tidak',
                    'berat_badan' => 70,
                    'tinggi_badan' => 170,
                    'lingkar_perut' => 90,
                    'tekanan_darah_sistolik' => 120,
                    'tekanan_darah_diastolik' => 80,
                    'gula_darah_sewaktu' => 'Normal',
                    'kolesterol_total' => 'Normal',
                    'masalah_kesehatan' => 'Tidak ada',
                    'obat_fasilitas' => 'Tidak ada',
                    'tindak_lanjut' => 'Check-up rutin',
                ],
                // Tambahkan data catatan pasien lainnya jika perlu
            ];

            foreach ($patientRecords as $recordData) {
                $patient->records()->create($recordData);
            }
        }
    }
}
