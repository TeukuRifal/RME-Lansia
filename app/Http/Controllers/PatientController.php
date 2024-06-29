<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function kesehatan()
    {
        $user = Auth::user();
        $patient = $user->patient;

        if (!$patient) {
            abort(404, 'Data pasien tidak ditemukan.');
        }

        // Ambil data IMT pasien per bulan
        $imtDataPerMonth = Patient::where('id', $patient->id)
            ->selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, AVG(indeks_massa_tubuh) as avg_imt')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Contoh data untuk chart lainnya (Lingkar Perut, Tekanan Darah, Gula Darah Sewaktu, Kolesterol)
        $healthData = [
            'Lingkar Perut' => Patient::where('id', $patient->id)->avg('lingkar_perut'),
            'Tekanan Darah' => Patient::where('id', $patient->id)->avg('tekanan_darah'),
            'Gula Darah Sewaktu' => Patient::where('id', $patient->id)->avg('gula_darah_sewaktu'),
            'Kolesterol Total' => Patient::where('id', $patient->id)->avg('kolesterol_total'),
        ];

        return view('pages.pasien.kesehatan', compact('patient','user', 'imtDataPerMonth', 'healthData'));
    }

    public function profil()
    {
        $user = Auth::user();
        $patient = $user->patient;

        return view('pages.pasien.profil', compact('patient','user'));
    }
}
