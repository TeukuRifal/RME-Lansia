<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCheckSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['nama_tempat', 'tanggal', 'waktu_mulai', 'waktu_selesai', 'lokasi'];

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
