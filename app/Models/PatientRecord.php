<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'record_date', 'riwayat_ptm_keluarga', 'riwayat_ptm_sendiri',
        'merokok', 'kurang_aktivitas_fisik', 'kurang_sayur_buah', 'konsumsi_alkohol',
        'stress', 'berat_badan', 'tinggi_badan', 'indeks_massa_tubuh', 'lingkar_perut',
        'tekanan_darah', 'tekanan_darah_sistolik','tekanan_darah_diastolik','gula_darah_sewaktu', 'kolesterol_total', 'masalah_kesehatan',
        'obat_fasilitas', 'tindak_lanjut',
    ];


    protected $casts = [
        'record_date' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
