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
        return Excel::download(new PatientsExport, 'Pasien.csv');
    }

    /**
     * Generate a PDF report for a patient's records.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        // Ambil data rekam medis pasien berdasarkan ID
        $record = PatientRecord::with('patient')->find($id);

        // Jika rekam medis tidak ditemukan, tampilkan error 404
        if (!$record) {
            abort(404, 'Record not found');
        }

        // Ambil semua rekam medis pasien terkait berdasarkan patient_id dan urutkan berdasarkan tanggal terbaru
        $patientRecords = PatientRecord::where('patient_id', $record->patient->id)
            ->orderBy('record_date', 'desc') // Mengurutkan berdasarkan tanggal terbaru
            ->get();

        // Ambil data terbaru
        $latestRecord = $patientRecords->first();

        // Periksa apakah data terbaru berhasil diambil
        if (!$latestRecord) {
            abort(404, 'No recent record found for this patient');
        }

        // Hitung IMT untuk data terbaru
        $heightInMeters = $latestRecord->tinggi_badan / 100; // Convert cm to meters
        $latestImt = $latestRecord->berat_badan / ($heightInMeters * $heightInMeters);
        $statusIMT = $latestImt < 18.5 ? 'Kekurangan berat badan' : ($latestImt >= 18.5 && $latestImt < 23 ? 'Berat badan normal' : ($latestImt >= 23 && $latestImt < 30 ? 'Kelebihan berat badan' : 'Obesitas'));

        // Kategorisasi Kolesterol
        $latestKolesterol = $latestRecord->kolesterol_total;
        $statusKolesterol = $latestKolesterol > 240 ? 'Tinggi' : ($latestKolesterol >= 200 && $latestKolesterol <= 240 ? 'Normal' : 'Baik');

        // Kategorisasi Tekanan Darah
        $sistolik = $latestRecord->tekanan_darah_sistolik;
        $diastolik = $latestRecord->tekanan_darah_diastolik;
        $statusTekananDarah = $sistolik > 160 || $diastolik > 100 ? 'Hipertensi tingkat 2' : ($sistolik >= 140 || $diastolik >= 90 ? 'Hipertensi tingkat 1' : ($sistolik >= 120 || $diastolik >= 80 ? 'Pra-hipertensi' : 'Normal'));

        // Kategorisasi Lingkar Perut (Jika diperlukan)
        $statusLingkarPerut = $latestRecord->lingkar_perut > 90 ? 'Tinggi' : 'Normal';

        // Siapkan data untuk PDF
        $pdf = Pdf::loadView('pdf.printPasien', [
            'record' => $record,
            'patientRecords' => $patientRecords,
            'latestRecord' => $latestRecord,
            'statusKolesterol' => $statusKolesterol,
            'statusIMT' => $statusIMT,
            'statusLingkarPerut' => $statusLingkarPerut,
            'statusTekananDarah' => $statusTekananDarah
        ]);

        // Tampilkan PDF
        return $pdf->download('RekamMedis_' . $record->patient->nama_lengkap . '.pdf');
    }
}
