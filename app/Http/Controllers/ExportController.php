<?php

namespace App\Http\Controllers;

use App\Models\PatientRecord;
use App\Exports\PatientsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

    public function print($id)
{
    // Ambil data rekam medis pasien berdasarkan ID
    $record = PatientRecord::with('patient')->find($id);

    // Jika rekam medis tidak ditemukan, tampilkan error 404
    if (!$record) {
        abort(404, 'Record not found');
    }

    // Ambil semua rekam medis pasien terkait berdasarkan patient_id
    $patientRecords = PatientRecord::where('patient_id', $record->patient->id)
        ->orderBy('record_date', 'asc')
        ->get();

    // Hitung IMT untuk setiap rekam medis
    $imtData = $patientRecords->map(function ($record) {
        $heightInMeters = $record->tinggi_badan / 100; // Convert cm to meters
        $imt = $record->berat_badan / ($heightInMeters * $heightInMeters);
        return [
            'date' => $record->record_date->format('F Y'),
            'imt' => $imt
        ];
    });

    // Kategorisasi IMT berdasarkan data terakhir
    $lastImt = $imtData->last()['imt'] ?? 0;
    $statusIMT = $lastImt < 18.5 ? 'Kekurangan berat badan' : ($lastImt >= 18.5 && $lastImt < 23 ? 'Berat badan normal' : ($lastImt >= 23 && $lastImt < 30 ? 'Kelebihan berat badan' : 'Obesitas'));

    // Kategorisasi Kolesterol berdasarkan data terakhir
    $lastKolesterol = $patientRecords->last()->kolesterol_total ?? 0;
    $statusKolesterol = $lastKolesterol > 240 ? 'Tinggi' : ($lastKolesterol >= 200 && $lastKolesterol <= 240 ? 'Normal' : 'Baik');

    // Kategorisasi Tekanan Darah berdasarkan data terakhir
    $lastRecord = $patientRecords->last();
    $sistolik = $lastRecord->tekanan_darah_sistolik ?? 0;
    $diastolik = $lastRecord->tekanan_darah_diastolik ?? 0;
    $statusTekananDarah = $sistolik > 160 || $diastolik > 100 ? 'Hipertensi tingkat 2' : ($sistolik >= 140 || $diastolik >= 90 ? 'Hipertensi tingkat 1' : ($sistolik >= 120 || $diastolik >= 80 ? 'Pra-hipertensi' : 'Normal'));

    // Kategorisasi Lingkar Perut (Jika diperlukan)
    $statusLingkarPerut = 'Normal'; // Default, sesuaikan jika ada logika tambahan

    // Siapkan data untuk PDF
    $pdf = Pdf::loadView('pages.admin.print', [
        'record' => $record,
        'patientRecords' => $patientRecords,
        'statusKolesterol' => $statusKolesterol,
        'statusIMT' => $statusIMT,
        'statusLingkarPerut' => $statusLingkarPerut,
        'statusTekananDarah' => $statusTekananDarah
    ]);

    // Tampilkan PDF
    return $pdf->stream('RekamMedis_' . $record->patient->nama_lengkap . '.pdf');
}
}
