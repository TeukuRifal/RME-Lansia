<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Events\UserLoggedIn;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Statistik utama
        $totalPatients = Patient::count();
        $totalLansia = Patient::where('umur', '>', 60)->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalSuperAdmins = User::where('role', 'superadmin')->count();
    
        // Data untuk chart jenis kelamin
        $genderData = Patient::selectRaw('jenis_kelamin, count(*) as count')
            ->groupBy('jenis_kelamin')
            ->get();
        $genderCounts = $genderData->pluck('count');
        $genderLabels = $genderData->pluck('jenis_kelamin');
    
        // Data untuk chart umur
        $ageData = Patient::selectRaw('FLOOR(DATEDIFF(CURRENT_DATE, tanggal_lahir) / 365) as age, count(*) as count')
            ->groupBy('age')
            ->get();
        $ageCounts = $ageData->pluck('count');
        $ageLabels = $ageData->pluck('age');
    
    
        return view('pages.admin.dashboard', compact('totalPatients', 'totalLansia', 'totalAdmins', 'totalSuperAdmins', 'genderCounts', 'genderLabels', 'ageCounts', 'ageLabels'));
    }    
    // Metode lain dari AdminController



    public function riwayatKesehatan()
    {
        $patients = Patient::with('patientRecords')->get();
        return view('pages.admin.riwayatKesehatan', compact('patients'));
    }

    public function filterRiwayat(Request $request)
    {
        $month = $request->input('month');
        $patients = Patient::with(['patientRecords' => function ($query) use ($month) {
            $query->whereMonth('record_date', $month);
        }])->get();
        
        return view('pages.admin.riwayatKesehatan', compact('patients', 'month'));
    }
}
