<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Menampilkan dashboard kesehatan pasien.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mendapatkan data pasien berdasarkan user yang sedang login
        $patient = Auth::user()->patient;

        // Total pasien dan lansia
        $totalPatients = Patient::count();
        $totalLansia = Patient::where('umur', '>', 60)->count();

        // Data untuk chart jenis kelamin
        $genderData = Patient::selectRaw('jenis_kelamin, count(*) as count')
            ->groupBy('jenis_kelamin')
            ->get();
        $genderCounts = $genderData->map(function ($item) {
            return $item->count;
        });
        $genderLabels = $genderData->map(function ($item) {
            return $item->jenis_kelamin;
        });

        // Data untuk chart umur
        $ageData = Patient::selectRaw('FLOOR(DATEDIFF(CURRENT_DATE, tanggal_lahir) / 365) as age, count(*) as count')
            ->groupBy('age')
            ->get();
        $ageCounts = $ageData->map(function ($item) {
            return $item->count;
        });
        $ageLabels = $ageData->map(function ($item) {
            return $item->age;
        });

        // Data kesehatan pasien untuk charts
        $healthData = [
            'IMT' => $patient->imt,
            'Lingkar Perut' => $patient->lingkar_perut,
            'Tekanan Darah' => $patient->tekanan_darah,
            'Gula Darah Sewaktu' => $patient->gula_darah_sewaktu,
            'Kolesterol Total' => $patient->kolesterol_total,
        ];

        // Data IMT per bulan (contoh kosong, sesuaikan dengan logika Anda)
        $imtDataPerMonth = []; // Ganti dengan logika sesuai kebutuhan aplikasi Anda

        return view('pages.pasien.kesehatan', compact('totalPatients', 'totalLansia', 'genderCounts', 'genderLabels', 'ageCounts', 'ageLabels', 'patient', 'healthData', 'imtDataPerMonth'));
    }

    /**
     * Menampilkan profil pasien.
     *
     * @return \Illuminate\View\View
     */
    public function profil()
    {
        $user = Auth::user();
        $patient = $user->patient;

        return view('pages.pasien.profil', compact('patient', 'user'));
    }
}
