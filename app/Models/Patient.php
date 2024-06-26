<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    protected $fillable = [
        'nama_lengkap', 'nik', 'password', // sesuaikan dengan atribut yang ada di tabel
        // tambahkan atribut lainnya sesuai kebutuhan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        // sesuaikan casting untuk atribut tanggal_lahir atau lainnya jika diperlukan
    ];

    /**
     * Validate the user against the given credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials($credentials)
    {
        $patient = Patient::where('nama_lengkap', $credentials['nama_lengkap'])->first();

        if ($patient) {
            return \Hash::check($credentials['password'], $patient->password);
        }

        return false;
    }
}

