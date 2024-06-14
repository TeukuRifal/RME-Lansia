<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class EditDataPasienController extends Controller
{
    public function editPasien($id)
    {
        $patient = Patient::find($id);
        return view('pages.admin.editPasien', compact('patient'));
    }

    public function updatePasien(Request $request, $id)
    {
        $patient = Patient::find($id);
        
        // Validasi data yang diterima dari form edit
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|string|max:10',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'pekerjaan' => 'nullable|string|max:100',
            'status_kawin' => 'nullable|string|max:100',
            'gol_darah' => 'nullable|string|max:3',
            'email' => 'nullable|email|max:255',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|string',
            'kurang_aktivitas_fisik' => 'nullable|string',
            'kurang_sayur_buah' => 'nullable|string',
            'konsumsi_alkohol' => 'nullable|string',
            'stress' => 'nullable|string',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'gula_darah_sewaktu' => 'nullable|string',
            'kolesterol_total' => 'nullable|string',
            'masalah_kesehatan' => 'nullable|string',
            'obat_fasilitas' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        // Update data pasien dengan data yang divalidasi
        $patient->update($validatedData);

        return redirect()->route('daftarPasien');
    }

    public function deletePasien($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('daftarPasien');
    }
}
