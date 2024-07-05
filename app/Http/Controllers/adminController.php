<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\PatientRecord;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count(); // Menghitung jumlah total pasien
        $totalLansia = Patient::where('umur', '>=', 60)->count(); // Menghitung jumlah pasien lansia (>60 tahun)
        
        $genderCounts = Patient::select('jenis_kelamin', DB::raw('COUNT(*) as count'))
                               ->groupBy('jenis_kelamin')
                               ->pluck('count', 'jenis_kelamin');
    
        $genderLabels = $genderCounts->keys();

        // Mengambil data untuk chart distribusi umur
        $ageCounts = [
            'Anak - Anak' => Patient::whereBetween('umur', [0, 20])->count(),
            'Remaja' => Patient::whereBetween('umur', [21, 40])->count(),
            'Dewasa' => Patient::whereBetween('umur', [41, 60])->count(),
            'Lansia' => Patient::where('umur', '>', 60)->count(),
        ];
        $ageLabels = array_keys($ageCounts);
    
        return view('pages.admin.dashboard', compact('genderLabels', 'genderCounts', 'ageLabels', 'ageCounts', 'totalPatients', 'totalLansia'));
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
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_kawin' => 'required|string',
            'gol_darah' => 'required|string',
            'email' => 'required|email|unique:patients|unique:users,email',
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|boolean',
            'kurang_aktivitas_fisik' => 'nullable|boolean',
            'kurang_sayur_buah' => 'nullable|boolean',
            'konsumsi_alkohol' => 'nullable|boolean',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'gula_darah_sewaktu' => 'nullable|string',
            'kolesterol_total' => 'nullable|string',
            'masalah_kesehatan' => 'nullable|string',
            'obat_fasilitas' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $validatedData['nama_lengkap'],
            'email' => $validatedData['email'],
            'username' => $validatedData['nik'], // Set username sebagai NIK
            'password' => bcrypt('password'), // Atur password default "default_password"
        ]);

        // Menambahkan data pasien
        $patient = Patient::create([
            'user_id' => $user->id,
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'nik' => $validatedData['nik'],
            'tanggal_lahir' => $validatedData['tanggal_lahir'],
            'umur' => $validatedData['umur'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'agama' => $validatedData['agama'],
            'alamat' => $validatedData['alamat'],
            'no_hp' => $validatedData['no_hp'],
            'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
            'pekerjaan' => $validatedData['pekerjaan'],
            'status_kawin' => $validatedData['status_kawin'],
            'gol_darah' => $validatedData['gol_darah'],
            'email' => $validatedData['email'],
        ]);

        // Menambahkan data riwayat kesehatan pasien
        $patientRecord = PatientRecord::create([
            'patient_id' => $patient->id,
            'record_date' => $validatedData['record_date'],
            'riwayat_ptm_keluarga' => $validatedData['riwayat_ptm_keluarga'],
            'riwayat_ptm_sendiri' => $validatedData['riwayat_ptm_sendiri'],
            'merokok' => $validatedData['merokok'],
            'kurang_aktivitas_fisik' => $validatedData['kurang_aktivitas_fisik'],
            'kurang_sayur_buah' => $validatedData['kurang_sayur_buah'],
            'konsumsi_alkohol' => $validatedData['konsumsi_alkohol'],
            'berat_badan' => $validatedData['berat_badan'],
            'tinggi_badan' => $validatedData['tinggi_badan'],
            'indeks_massa_tubuh' => $validatedData['indeks_massa_tubuh'],
            'lingkar_perut' => $validatedData['lingkar_perut'],
            'tekanan_darah' => $validatedData['tekanan_darah'],
            'gula_darah_sewaktu' => $validatedData['gula_darah_sewaktu'],
            'kolesterol_total' => $validatedData['kolesterol_total'],
            'masalah_kesehatan' => $validatedData['masalah_kesehatan'],
            'obat_fasilitas' => $validatedData['obat_fasilitas'],
            'tindak_lanjut' => $validatedData['tindak_lanjut'],
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

    public function update(Request $request, Patient $patient)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:patients,nik,'.$patient->id,
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_kawin' => 'required|string',
            'gol_darah' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$patient->user->id.'|unique:patients,email,'.$patient->id,
        ]);

        $patient->update($validatedData);

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

    public function detailUser(PatientRecord $patientRecord)
    {
        return view('pages.admin.detailUser', compact('patientRecord'));
    }

    public function updateDetailUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|boolean',
            'kurang_aktivitas_fisik' => 'nullable|boolean',
            'kurang_sayur_buah' => 'nullable|boolean',
            'konsumsi_alkohol' => 'nullable|boolean',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'gula_darah_sewaktu' => 'nullable|string',
            'kolesterol_total' => 'nullable|string',
            'masalah_kesehatan' => 'nullable|string',
            'obat_fasilitas' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        $patientRecord = PatientRecord::findOrFail($id);
        $patientRecord->update($validatedData);

        return redirect()->back()->with('success', 'Data riwayat kesehatan pasien berhasil diperbarui.');
    }

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
