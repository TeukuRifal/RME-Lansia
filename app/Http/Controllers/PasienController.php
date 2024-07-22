<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\HealthCheckSchedule;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Menampilkan dashboard kesehatan pasien.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        // Mendapatkan data pasien berdasarkan user yang sedang login
        $user = Auth::user();
        $pasien = $user->patient;
    
        // Mendapatkan data riwayat pasien
        $patientRecords = PatientRecord::where('patient_id', $pasien->id)->orderBy('record_date', 'asc')->get();
    
        // Mengambil data untuk masing-masing grafik
        $dataPerGrafik = [
            'Lingkar Perut' => $patientRecords->pluck('lingkar_perut'),
            'Gula Darah' => $patientRecords->pluck('gula_darah_sewaktu'),
            'Tekanan Darah Sistolik' => $patientRecords->pluck('tekanan_darah_sistolik'),
            'Tekanan Darah Diastolik' => $patientRecords->pluck('tekanan_darah_diastolik'),
            
            'Kolesterol' => $patientRecords->pluck('kolesterol_total')
        ];
    
        $recordDates = $patientRecords->pluck('record_date')->map(function ($date) {
            return $date->format('F Y');
        });

        $dates = $patientRecords->pluck('record_date')->unique(function ($item) {
            return $item->format('Y-m');
        })->map(function ($date) {
            return $date->format('F Y');
        });

        $jadwal = HealthCheckSchedule::all();
    
        return view('pages.pasien.beranda', compact('pasien', 'dataPerGrafik', 'recordDates','jadwal', 'dates'));
    }
    

    public function tambahPasien()
    {
        return view('pages.admin.tambahPasien');
    }

    public function storePasien(Request $request)
{
    $validatedData = $request->validate([
        'nama_lengkap' => 'required|string',
        'nik' => 'required|unique:patients|string',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|string',
        'email' => 'required|email|unique:patients|unique:users,email',
    ]);

    // Cek apakah user dengan NIK ini sudah ada
    $existingUser = User::where('username', $validatedData['nik'])->first();

    if ($existingUser) {
        return redirect()->back()->withErrors(['nik' => 'NIK sudah terdaftar.']);
    }

    // Membuat user baru
    $user = User::create([
        'name' => $validatedData['nama_lengkap'],
        'email' => $validatedData['email'],
        'username' => $validatedData['nik'], // Set username sebagai NIK
        'password' => bcrypt('password'), // Atur password default
    ]);

    // Menambahkan data pasien
    Patient::create([
        'user_id' => $user->id,
        'nama_lengkap' => $validatedData['nama_lengkap'],
        'nik' => $validatedData['nik'],
        'tanggal_lahir' => $validatedData['tanggal_lahir'],
        'jenis_kelamin' => $validatedData['jenis_kelamin'],
        'agama' => $request->input('agama'),
        'alamat' => $request->input('alamat'),
        'no_hp' => $request->input('no_hp'),
        'pendidikan_terakhir' => $request->input('pendidikan_terakhir'),
        'pekerjaan' => $request->input('pekerjaan'),
        'status_kawin' => $request->input('status_kawin'),
        'gol_darah' => $request->input('gol_darah'),
        'email' => $validatedData['email'],
    ]);

    return redirect()->back()->with('success', 'Data pasien berhasil ditambahkan');
}



    public function daftarPasien()
    {
        $patients = Patient::all();
        return view('pages.admin.daftarPasien', compact('patients'));
    }

    public function editRiwayat($record_id)
    {
        $riwayat = PatientRecord::findOrFail($record_id);
        return view('pages.admin.editRiwayat', compact('riwayat'));
    }

    public function editPasien($id)
    {
        $pasien = Patient::findOrFail($id);
        return view('pages.admin.editPasien', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            // Atur validasi sesuai kebutuhan
        ]);

        // Temukan rekam medis yang akan diperbarui berdasarkan $id
        $patientRecord = PatientRecord::findOrFail($id);

        // Update data rekam medis dengan data dari request
        $patientRecord->fill([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        // Simpan perubahan
        $patientRecord->save();

        // Redirect atau kirim respons sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Data rekam medis berhasil diperbarui.');
    }

    public function updatePasien(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:patients,nik,'.$id,
            'tanggal_lahir' => 'required|date',
          
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_kawin' => 'required|string',
            'gol_darah' => 'required|string',
            'email' => 'required|string',
        ]);

        // Mendapatkan pasien berdasarkan ID
        $patient = Patient::findOrFail($id);

        // Update pasien
        $patient->update($validatedData);

        // Update user terkait
        $patient->user->update([
            'name' => $validatedData['nama_lengkap'],
            'username' => $validatedData['nik'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('daftarPasien')
                         ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function deletePasien($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            // Hapus juga user terkait dengan pasien
            $patient->user()->delete(); // Hapus user terlebih dahulu karena menggunakan relasi
            $patient->delete(); // Hapus data pasien

            return response()->json(['success' => 'Pasien berhasil dihapus']);
        } else {
            return response()->json(['error' => 'Pasien tidak ditemukan'], 404);
        }
    }

    /**
     * Menampilkan profil pasien.
     *
     * @return \Illuminate\View\View
     */
    public function profil()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Mendapatkan data pasien terkait dengan user
        $pasien = $user->patient;

        // Ambil semua record kesehatan pasien, diurutkan berdasarkan tanggal terbaru
        $healthRecords = PatientRecord::where('patient_id', $pasien->id)
            ->orderBy('record_date', 'desc')
            ->get();

        // Ambil daftar bulan dan tahun unik dari data yang ada
        $months = $healthRecords->unique(function ($item) {
            return $item->record_date->format('m');
        })->sortBy('record_date')
          ->pluck('record_date')
          ->map(function ($date) {
              return $date->format('F');
          });

        $years = $healthRecords->unique(function ($item) {
            return $item->record_date->format('Y');
        })->sortBy('record_date')
          ->pluck('record_date')
          ->map(function ($date) {
              return $date->format('Y');
          });

        // Ambil daftar tanggal unik dalam format tertentu dari data yang ada
        $dates = $healthRecords->pluck('record_date')->unique(function ($item) {
            return $item->format('Y-m');
        })->map(function ($date) {
            return $date->format('F Y');
        });

        return view('pages.pasien.profil', compact('pasien', 'user', 'healthRecords', 'months', 'years', 'dates'));
    }

    public function getHealthRecordsByDate(Request $request)
    {
        // Ambil tanggal yang dipilih dari request
        $selectedDate = $request->tanggal;

        // Ambil semua record kesehatan pasien berdasarkan tanggal yang dipilih
        $healthRecords = PatientRecord::whereDate('record_date', $selectedDate)
            ->orderBy('record_date', 'desc')
            ->get();

        // Mengembalikan data dalam format JSON
        return response()->json($healthRecords);
    }
    

    

    public function jadwal()
    {
        $jadwal = HealthCheckSchedule::all();
        return view('pages.pasien.jadwal', compact('jadwal')); // Pastikan Anda memiliki beranda.blade.php di resources/views
    }
}
