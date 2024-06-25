<?php

// PatientSeeder.php
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
                'email' => null, // Assuming no email for patients
                'password' => Hash::make('password'), // You can generate random password here
                'role' => 'patient',
                'nik' => $patient->nik, // Assuming NIK is unique identifier
            ]);
        }
    }
}