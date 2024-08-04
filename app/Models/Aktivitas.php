<?php

// app/Models/Aktivitas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';

    protected $fillable = ['judul', 'deskripsi', 'tgl_aktivitas', 'gambar'];

    protected $dates = ['tgl_aktivitas'];
}
