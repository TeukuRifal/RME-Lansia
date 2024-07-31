<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\ActivityLog;
use App\Events\UserLoggedIn;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\HealthCheckSchedule;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalPatients = Patient::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalSuperAdmins = User::where('role', 'superadmin')->count();
        
        // Statistik Lansia
        $totalElderly = Patient::whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) >= 60')->count();
        
        // Data untuk chart jenis kelamin
        $genderData = Patient::selectRaw('jenis_kelamin, count(*) as count')
            ->groupBy('jenis_kelamin')
            ->get();
        $genderCounts = $genderData->pluck('count');
        $genderLabels = $genderData->pluck('jenis_kelamin');
    
        // Data untuk chart usia
        $ageData = Patient::selectRaw('FLOOR(DATEDIFF(CURRENT_DATE, tanggal_lahir) / 365) as age, count(*) as count')
            ->groupBy('age')
            ->get();
        $ageCounts = $ageData->pluck('count');
        $ageLabels = $ageData->pluck('age');
        
        $schedules = HealthCheckSchedule::all();
        
        return view('pages.admin.dashboard', compact('totalPatients', 'totalElderly', 'totalAdmins', 'totalSuperAdmins', 'genderCounts', 'genderLabels', 'ageCounts', 'ageLabels', 'schedules'));
    }
    
    // Metode lain dari AdminController



    public function riwayatKesehatan()
    {
        $patients = Patient::with('patientRecords')->get();
        return view('pages.admin.riwayatKesehatan', compact('patients'));
    }

    // public function filterRiwayat(Request $request)
    // {
    //     $month = $request->input('month');
    //     $patients = Patient::with(['patientRecords' => function ($query) use ($month) {
    //         $query->whereMonth('record_date', $month);
    //     }])->get();
        
    //     return view('pages.admin.riwayatKesehatan', compact('patients', 'month'));
    // }
}
