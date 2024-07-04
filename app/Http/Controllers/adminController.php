<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $totalPatients = Patient::count(); // Menghitung jumlah total pasien
        $totalLansia = Patient::where('umur', '>=', 60)->count(); // Menghitung jumlah pasien lansia (>60 tahun)
        
        $genderCounts = Patient::select('jenis_kelamin', \DB::raw('COUNT(*) as count'))
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
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:patients',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'pendidikan_terakhir' => 'required',
            'pekerjaan' => 'required',
            'status_kawin' => 'required',
            'gol_darah' => 'required',
            'email' => 'required|email|unique:patients',
            'record_date' => 'required|date',
        ]);
    
        // Membuat user baru
        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'username' => $request->nik, // Set username sebagai NIK
            'password' => bcrypt('password'), // Atur password default "password"
        ]);
    
        // Menambahkan data pasien
        $patient = Patient::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'status_kawin' => $request->status_kawin,
            'gol_darah' => $request->gol_darah,
            'email' => $request->email,
        ]);
    
        // Menambahkan data riwayat kesehatan pasien
        $patientRecord = PatientRecord::create([
            'patient_id' => $patient->id,
            'record_date' => $request->record_date,
            'riwayat_ptm_keluarga' => $request->riwayat_ptm_keluarga,
            'riwayat_ptm_sendiri' => $request->riwayat_ptm_sendiri,
            'merokok' => $request->merokok,
            'kurang_aktivitas_fisik' => $request->kurang_aktivitas_fisik,
            'kurang_sayur_buah' => $request->kurang_sayur_buah,
            'konsumsi_alkohol' => $request->konsumsi_alkohol,
            'stress' => $request->stress,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'indeks_massa_tubuh' => $request->indeks_massa_tubuh,
            'lingkar_perut' => $request->lingkar_perut,
            'tekanan_darah' => $request->tekanan_darah,
            'gula_darah_sewaktu' => $request->gula_darah_sewaktu,
            'kolesterol_total' => $request->kolesterol_total,
            'masalah_kesehatan' => $request->masalah_kesehatan,
            'obat_fasilitas' => $request->obat_fasilitas,
            'tindak_lanjut' => $request->tindak_lanjut,
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
        $request->validate([
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

        $patient->update($request->all());

        $patient->user->update([
            'name' => $request->input('nama_lengkap'),
            'username' => $request->input('nik'),
            'email' => $request->input('email'),
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

/**
     * Update detail user based on PatientRecord.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDetailUser(Request $request, $id)
    {
        $request->validate([
            // Add validation rules according to your requirements
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'required|string',
            'riwayat_ptm_sendiri' => 'required|string',
            'merokok' => 'required|boolean',
            'kurang_aktivitas_fisik' => 'required|boolean',
            'kurang_sayur_buah' => 'required|boolean',
            'konsumsi_alkohol' => 'required|boolean',
            'stress' => 'required|boolean',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'indeks_massa_tubuh' => 'required|numeric',
            'lingkar_perut' => 'required|numeric',
            'tekanan_darah' => 'required|string',
            'gula_darah_sewaktu' => 'required|string',
            'kolesterol_total' => 'required|string',
            'masalah_kesehatan' => 'required|string',
            'obat_fasilitas' => 'required|string',
            'tindak_lanjut' => 'required|string',
        ]);

        try {
            $patientRecord = PatientRecord::findOrFail($id);
            $patientRecord->update($request->all());

            return redirect()->route('detailUser', ['id' => $patientRecord->patient_id])
                             ->with('success', 'Detail user berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'Gagal memperbarui detail user: ' . $e->getMessage());
        }
    }
    
    public function pengaturan()
    {
        return view('pages.admin.pengaturan');
    }

    public function updateSettings(Request $request)
    {
        // Logic untuk menyimpan pengaturan
        return redirect()->route('pengaturan')->with('message', 'Pengaturan berhasil diperbarui');
    }
}
