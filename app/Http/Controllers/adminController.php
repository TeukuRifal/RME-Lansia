<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function tambahPasien()
    {
        return view('pages.admin.tambahPasien');
    }

    public function storePasien(Request $request)
    {
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

        return redirect()->route('daftarPasien');
    }

    public function daftarPasien()
    {
        $patients = Patient::all();
        return view('pages.admin.daftarPasien', compact('patients'));
    }

    public function pengaturan()
    {
        return view('pages.admin.pengaturan');
    }

    public function updateSettings(Request $request)
    {
        // Logic to update settings
        return redirect()->route('pengaturan');
    }

    public function editPasien($id)
    {
        $patient = Patient::find($id);
        return view('pages.admin.editPasien', compact('patient'));
    }

    public function updatePasien(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->update($request->all());
        return redirect()->route('daftarPasien');
    }

    public function deletePasien($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('daftarPasien');
    }
}
