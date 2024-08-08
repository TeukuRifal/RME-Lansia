<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;
use App\Models\HealthCheckSchedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Activitylog\Models\Activity;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengguna dan rekaman pasien
        $totalUsers = User::count();
        $totalRecords = PatientRecord::count();
        $newPatientsCount = Patient::whereDate('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $totalSchedules = HealthCheckSchedule::count(); // Total jadwal pemeriksaan
        $schedules = HealthCheckSchedule::all(); // Ambil jadwal kesehatan

        // Menghitung rata-rata IMT
        $totalBMI = 0;
        $countBMI = 0;

        foreach (PatientRecord::all() as $record) {
            if ($record->berat_badan && $record->tinggi_badan) {
                $heightInMeters = $record->tinggi_badan / 100;
                $bmi = $record->berat_badan / ($heightInMeters * $heightInMeters);
                $totalBMI += $bmi;
                $countBMI++;
            }
        }

        $averageBMI = $countBMI > 0 ? $totalBMI / $countBMI : 0;

        // Menghitung jumlah rekaman per bulan berdasarkan record_date
        $recordCounts = [];
        $months = [];
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i)->format('F');
            $months[] = $month;
            $recordCounts[$month] = PatientRecord::whereYear('record_date', Carbon::now()->subMonths($i)->year)
                ->whereMonth('record_date', Carbon::now()->subMonths($i)->month)
                ->count();
        }

        // Peringatan Kesehatan
        $healthAlerts = PatientRecord::where(function ($query) {
            $query->whereRaw('(berat_badan / ((tinggi_badan / 100) * (tinggi_badan / 100))) < ?', [18.5]) // BMI < 18.5 (underweight)
                ->orWhereRaw('(berat_badan / ((tinggi_badan / 100) * (tinggi_badan / 100))) > ?', [30]); // BMI > 30 (obese)
        })->get();

        // Ambil daftar pengguna
        $users = User::all();

        // Ambil notifikasi terbaru
        $recentNotifications = collect([
            (object)['message' => 'Pasien baru ditambahkan: John Doe'],
            (object)['message' => 'Jadwal akan datang: 2024-08-10'],
        ]);

        return view('pages.superadmin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRecords' => $totalRecords,
            'newPatientsCount' => $newPatientsCount,
            'totalSchedules' => $totalSchedules,
            'averageBMI' => $averageBMI,
            'months' => array_reverse($months), // Mengurutkan bulan dari Januari ke bulan terakhir
            'recordCounts' => array_values(array_reverse($recordCounts)), // Mengurutkan data sesuai bulan
            'healthLabels' => ['Sehat', 'Perlu Perhatian'],
            'healthAlerts' => $healthAlerts,
            'users' => $users,
            'schedules' => $schedules,
        ]);
    }





    public function indexSuperadmins()
    {
        // Ambil semua pengguna dengan peran admin, superadmin, dan pasien
        $superadmins = User::whereIn('role', ['admin', 'superadmin', 'patient'])->get();
        return view('pages.superadmin.admins.index', compact('superadmins'));
    }

    public function create()
    {
        return view('pages.superadmin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin',
        ]);

        $role = $request->role;

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        event(new Registered($admin));

        return redirect()->route('superadmin.superadmins.index')->with('success', ucfirst($role) . ' berhasil dibuat. Silakan verifikasi email Anda.');
    }

    public function edit($id)
    {
        $superadmin = User::findOrFail($id);
        return view('pages.superadmin.admins.edit', compact('superadmin'));
    }

    public function update(Request $request, $id)
    {
        $superadmin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $superadmin->id,
        ]);

        if ($request->password) {
            $request->validate(['password' => 'string|min:8|confirmed']);
            $superadmin->password = Hash::make($request->password);
        }

        $superadmin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $superadmin->password,
        ]);

        return redirect()->route('superadmin.superadmins.index')->with('success', ucfirst($superadmin->role) . ' berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => 'Akun berhasil dihapus.']);
    }

    public function logs()
    {
        $logs = Activity::all();
        return view('pages.superadmin.logs', compact('logs'));
    }

    public function reports()
    {
        return view('pages.superadmin.reports');
    }

    public function settings()
    {
        return view('pages.superadmin.settings');
    }

    public function content()
    {
        return view('pages.superadmin.content');
    }
}
