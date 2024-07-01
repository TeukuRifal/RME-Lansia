<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;

class RiwayatKesehatanController extends Controller
{
    public function index($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $healthRecords = PatientRecord::where('patient_id', $patient_id)->orderBy('record_date', 'desc')->get();
        return view('pages.admin.riwayat_kesehatan', compact('patient', 'healthRecords'));
    }

    public function editRiwayat($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $riwayat = PatientRecord::where('patient_id', $patient_id)->first(); // Ambil riwayat pertama jika ada
    
        // Jika riwayat kosong, inisialisasi objek kosong
        if (!$riwayat) {
            $riwayat = new PatientRecord();
            $riwayat->patient_id = $patient_id;
        }
    
        return view('pages.admin.edit_riwayat', compact('riwayat'));
    }

    public function update(Request $request, $record_id)
    {
        $request->validate([
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|string',
            'kurang_aktivitas_fisik' => 'nullable|string',
            'kurang_sayur_buah' => 'nullable|string',
            'konsumsi_alkohol' => 'nullable|string',
            'stress' => 'nullable|string',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',
            'indeks_massa_tubuh' => 'nullable|numeric',
            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'gula_darah_sewaktu' => 'nullable|numeric',
            'kolesterol_total' => 'nullable|numeric',
            'masalah_kesehatan' => 'nullable|string',
            'obat_fasilitas' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        $riwayat = PatientRecord::findOrFail($record_id);
        $riwayat->update($request->all());

        return redirect()->route('healthHistory', ['patient_id' => $riwayat->patient_id])
            ->with('success', 'Riwayat kesehatan berhasil diperbarui.');
    }
}
