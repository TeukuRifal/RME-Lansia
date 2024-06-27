<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;

class AdminController extends Controller
{
    public function dashboard()
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
        // Validasi input jika diperlukan
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:patients',
            // tambahkan validasi sesuai dengan kebutuhan
        ]);

        // Simpan data pasien ke tabel patients
        $patient = new Patient();
        $patient->nama_lengkap = $request->nama_lengkap;
        $patient->nik = $request->nik;
        $patient->tanggal_lahir = $request->tanggal_lahir;
        $patient->umur = $request->umur;
        $patient->jenis_kelamin = $request->jenis_kelamin;
        $patient->alamat = $request->alamat;
        $patient->no_hp = $request->no_hp;
        $patient->pendidikan_terakhir = $request->pendidikan_terakhir;
        $patient->pekerjaan = $request->pekerjaan;
        $patient->status_kawin = $request->status_kawin;
        $patient->gol_darah = $request->gol_darah;
        $patient->email = $request->email;
        $patient->riwayat_ptm_keluarga = $request->riwayat_ptm_keluarga;
        $patient->riwayat_ptm_sendiri = $request->riwayat_ptm_sendiri;
        $patient->merokok = $request->merokok;
        $patient->kurang_aktivitas_fisik = $request->kurang_aktivitas_fisik;
        $patient->kurang_sayur_buah = $request->kurang_sayur_buah;
        $patient->konsumsi_alkohol = $request->konsumsi_alkohol;
        $patient->stress = $request->stress;
        $patient->berat_badan = $request->berat_badan;
        $patient->tinggi_badan = $request->tinggi_badan;
        $patient->indeks_massa_tubuh = $request->indeks_massa_tubuh;
        $patient->lingkar_perut = $request->lingkar_perut;
        $patient->tekanan_darah = $request->tekanan_darah;
        $patient->gula_darah_sewaktu = $request->gula_darah_sewaktu;
        $patient->kolesterol_total = $request->kolesterol_total;
        $patient->masalah_kesehatan = $request->masalah_kesehatan;
        $patient->obat_fasilitas = $request->obat_fasilitas;
        $patient->tindak_lanjut = $request->tindak_lanjut;

        $patient->save();

        // Buat akun pengguna untuk pasien
        User::create([
            'name' => $patient->nama_lengkap,
            'username' => $patient->nik, // Gunakan NIK sebagai username
            'password' => bcrypt($request->input('password')), // Password yang di-hash
            'role' => 'patient',
        ]);

        return back()->with('message', 'Data Pasien Berhasil Ditambahkan');
    }

    public function daftarPasien()
    {
        $patients = Patient::all();
        return view('pages.admin.daftarPasien', compact('patients'));
    }

    public function editPasien($id)
    {
        $patient = Patient::find($id);
        return view('pages.admin.editPasien', compact('patient'));
    }

    public function updatePasien(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:patients,nik,' . $id,
            // tambahkan validasi sesuai dengan kebutuhan
        ]);

        $patient = Patient::find($id);
        $patient->update($request->all());

        return redirect()->route('daftarPasien')->with('message', 'Data Pasien berhasil diperbarui');
    }

    public function deletePasien($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return response()->json(['success' => 'Pasien berhasil dihapus']);
        } else {
            return response()->json(['error' => 'Pasien tidak ditemukan'], 404);
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
