<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
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
        $pasien = Auth::user()->patient;

        return view('pages.pasien.beranda', compact('pasien'));
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

    public function updatePasien(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nik' => 'required|string|unique:patients,nik,'.$id,
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_kawin' => 'required|string',
            'gol_darah' => 'required|string',
            'email' => 'required|string|email',
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
        $user = Auth::user();
        $pasien = $user->patient;
        
        return view('pages.pasien.profil', compact('pasien', 'user'));
    }

    public function jadwal()
    {
        return view('pages.pasien.jadwal'); // Pastikan Anda memiliki beranda.blade.php di resources/views
    }
}
