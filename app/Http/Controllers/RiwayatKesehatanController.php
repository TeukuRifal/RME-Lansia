<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;

class RiwayatKesehatanController extends Controller
{
    public function index($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $healthRecords = PatientRecord::where('patient_id', $patient_id)->orderByDesc('record_date', 'desc')->get();
    
        // Ambil bulan dari riwayat kesehatan
        $months = $this->getHealthRecordMonths($healthRecords);
    
        // Ambil semua tanggal rekam medik yang unik dari data riwayat kesehatan
        $recordDates = $healthRecords->pluck('record_date')->unique();
    
        return view('pages.admin.riwayat_kesehatan', compact('patient', 'healthRecords', 'months', 'recordDates'));
    }
    

    public function editRiwayat($record_id)
    {
        $riwayat = PatientRecord::findOrFail($record_id);
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

    public function addPatientRecord($patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        return view('pages.admin.tambahDataKesehatan', compact('patient'));
    }

    public function storePatientRecord(Request $request, $patient_id)
    {
        $request->validate([
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|string',
            'kurang_aktivitas_fisik' => 'nullable|string',
            'kurang_sayur_buah' => 'nullable|string',
            'konsumsi_alkohol' => 'nullable|string',
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

        $patientRecord = new PatientRecord();
        $patientRecord->patient_id = $patient_id;
        $patientRecord->record_date = $request->record_date;
        $patientRecord->riwayat_ptm_keluarga = $request->riwayat_ptm_keluarga;
        $patientRecord->riwayat_ptm_sendiri = $request->riwayat_ptm_sendiri;
        $patientRecord->merokok = $request->merokok;
        $patientRecord->kurang_aktivitas_fisik = $request->kurang_aktivitas_fisik;
        $patientRecord->kurang_sayur_buah = $request->kurang_sayur_buah;
        $patientRecord->konsumsi_alkohol = $request->konsumsi_alkohol;
        $patientRecord->berat_badan = $request->berat_badan;
        $patientRecord->tinggi_badan = $request->tinggi_badan;
        $patientRecord->indeks_massa_tubuh = $request->indeks_massa_tubuh;
        $patientRecord->lingkar_perut = $request->lingkar_perut;
        $patientRecord->tekanan_darah = $request->tekanan_darah;
        $patientRecord->gula_darah_sewaktu = $request->gula_darah_sewaktu;
        $patientRecord->kolesterol_total = $request->kolesterol_total;
        $patientRecord->masalah_kesehatan = $request->masalah_kesehatan;
        $patientRecord->obat_fasilitas = $request->obat_fasilitas;
        $patientRecord->tindak_lanjut = $request->tindak_lanjut;
        $patientRecord->save();

        return redirect()->route('healthHistory', ['patient_id' => $patient_id])
            ->with('success', 'Data kesehatan berhasil ditambahkan.');
    }

    public function filterByMonth(Request $request)
    {
        $month = $request->input('month');
        $patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($patient_id);
        
        if ($month) {
            $records = PatientRecord::where('patient_id', $patient_id)
                ->whereMonth('record_date', $month)
                ->get();
        } else {
            $records = PatientRecord::where('patient_id', $patient_id)->get();
        }

        return view('pages.admin.healthHistory', compact('patient', 'records'));
    }
    public function getHealthRecordMonths($healthRecords)
    {
        $months = [];
        foreach ($healthRecords as $record) {
            $bulan = Carbon::parse($record->record_date)->month;
            $namaBulan = Carbon::parse($record->record_date)->translatedFormat('F');
            $months[$bulan] = $namaBulan;
        }
        return $months;
    }

    public function getHealthRecordsByMonth($patientId, Request $request)
    {
        $bulan = $request->input('month');
        $healthRecords = ($bulan) ?
            PatientRecord::where('patient_id', $patientId)
                ->whereMonth('record_date', $bulan)
                ->orderByDesc('record_date')
                ->get() :
            PatientRecord::where('patient_id', $patientId)->orderByDesc('record_date')->get();

        $recordsHtml = view('partials.health_records', compact('healthRecords'))->render();

        return response()->json(compact('healthRecords', 'recordsHtml'));
    }
    
}
