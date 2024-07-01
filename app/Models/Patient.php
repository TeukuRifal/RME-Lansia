<?php
// app/Models/Patient.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama_lengkap', 'nik', 'tanggal_lahir', 'umur', 'jenis_kelamin',
        'alamat', 'no_hp', 'pendidikan_terakhir', 'pekerjaan', 'status_kawin',
        'gol_darah', 'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(PatientRecord::class);
    }
}
