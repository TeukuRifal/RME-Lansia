<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            SuperAdminSeeder::class,
            PatientSeeder::class,
            AktivitasSeeder::class,
        ]);
    }
}