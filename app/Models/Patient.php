<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public function up()
{
    Schema::create('patients', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nik');
        $table->integer('umur');
        $table->text('alamat');
        $table->string('penyakit');
        $table->timestamps();
    });
}

protected $fillable = [
    'nama_lengkap', 'nik', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', 'no_hp', 
    'pendidikan_terakhir', 'pekerjaan', 'status_kawin', 'gol_darah', 'email', 'riwayat_ptm_keluarga', 
    'riwayat_ptm_sendiri', 'merokok', 'kurang_aktivitas_fisik', 'kurang_sayur_buah', 'konsumsi_alkohol', 
    'stress', 'berat_badan', 'tinggi_badan', 'indeks_massa_tubuh', 'lingkar_perut', 'tekanan_darah', 
    'gula_darah_sewaktu', 'kolesterol_total', 'masalah_kesehatan', 'obat_fasilitas', 'tindak_lanjut'
];

}

