<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\PatientRecord;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RiwayatKesehatanController extends Controller
{
    /**
     * Menampilkan halaman riwayat kesehatan pasien.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($patient_id)
    {
        try {
            $patient = Patient::findOrFail($patient_id);

            // Ambil semua rekam medis berdasarkan pasien
            $healthRecords = PatientRecord::where('patient_id', $patient->id)->get();

            // Ambil daftar tanggal rekam medis untuk dropdown
            $recordDates = $healthRecords->pluck('record_date')->unique();

            // Mengubah format bulan menjadi Juli 2024
            $formattedDates = $recordDates->map(function ($date) {
                return Carbon::parse($date)->isoFormat('MMMM YYYY');
            });

            return view('pages.admin.riwayat_kesehatan', [
                'patient' => $patient,
                'healthRecords' => $healthRecords,
                'recordDates' => $formattedDates,
            ]);
        } catch (ModelNotFoundException $e) {
            // Handle if patient data is not found
            return response()->json(['error' => 'Data pasien tidak ditemukan'], 404);
        }
    }



    public function fetchHealthRecord($patient_id)
    {
        try {
            $patient = Patient::findOrFail($patient_id);
            return response()->json(['url' => route('healthHistory', $patient_id)]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Data pasien tidak ditemukan'], 404);
        }
    }


    public function rekamMedis(Request $request)
    {
        $records = PatientRecord::with('patient')->get();

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('pdf.assets',  ['records' => $records]);
            return $pdf->stream('RekamMedis.pdf');
        }
        return view('pages.admin.rekamMedis', compact('records'));
    }



    public function create()
    {
        return view('pages.admin.tambahRekamMedis');
    }

    public function fetchPatients(Request $request)
    {
        $search = $request->input('search');
        $patients = Patient::query()
            ->where('nama_lengkap', 'LIKE', "%{$search}%")
            ->orWhere('nik', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->get();

        return response()->json($patients);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:patients,nik',
            'record_date' => 'required|date',
            'riwayat_ptm_keluarga' => 'nullable|string',
            'riwayat_ptm_sendiri' => 'nullable|string',
            'merokok' => 'nullable|string',
            'kurang_aktivitas_fisik' => 'nullable|string',
            'kurang_sayur_buah' => 'nullable|string',
            'konsumsi_alkohol' => 'nullable|string',
            'berat_badan' => 'nullable|numeric',
            'tinggi_badan' => 'nullable|numeric',

            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'tekanan_darah_sistolik' => 'nullable|string',
            'tekanan_darah_diastolik' => 'nullable|string',
            'gula_darah_sewaktu' => 'nullable|numeric',
            'kolesterol_total' => 'nullable|numeric',
            'masalah_kesehatan' => 'nullable|string',
            'obat_fasilitas' => 'nullable|string',
            'tindak_lanjut' => 'nullable|string',
        ]);

        $patient = Patient::where('nik', $request->nik)->first();

        PatientRecord::create([
            'patient_id' => $patient->id,
            'record_date' => $request->record_date,
            'riwayat_ptm_keluarga' => $request->riwayat_ptm_keluarga,
            'riwayat_ptm_sendiri' => $request->riwayat_ptm_sendiri,
            'merokok' => $request->merokok,
            'kurang_aktivitas_fisik' => $request->kurang_aktivitas_fisik,
            'kurang_sayur_buah' => $request->kurang_sayur_buah,
            'konsumsi_alkohol' => $request->konsumsi_alkohol,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,

            'lingkar_perut' => $request->lingkar_perut,
            'tekanan_darah' => $request->tekanan_darah,
            'tekanan_darah_sistolik' => $request->tekanan_darah_sistolik,
            'tekanan_darah_diastolik' => $request->tekanan_darah_diastolik,
            'gula_darah_sewaktu' => $request->gula_darah_sewaktu,
            'kolesterol_total' => $request->kolesterol_total,
            'masalah_kesehatan' => $request->masalah_kesehatan,
            'obat_fasilitas' => $request->obat_fasilitas,
            'tindak_lanjut' => $request->tindak_lanjut,
        ]);

        return redirect()->route('rekamMedis')->with('success', 'Patient record added successfully.');
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

            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'tekanan_darah_sistolik' => 'nullable|string',
            'tekanan_darah_diastolik' => 'nullable|string',
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

            'lingkar_perut' => 'nullable|numeric',
            'tekanan_darah' => 'nullable|string',
            'tekanan_darah_sistolik' => 'nullable|string',
            'tekanan_darah_diastolik' => 'nullable|string',
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

        $patientRecord->lingkar_perut = $request->lingkar_perut;
        $patientRecord->tekanan_darah = $request->tekanan_darah;
        $patientRecord->tekanan_darah_sistolik = $request->tekanan_darah_sistolik;
        $patientRecord->tekanan_darah_diastolik = $request->tekanan_darah_diastolik;
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
            'patientRecords' => $patientRecords, // Pastikan data ini tersedia di view
            'statusKolesterol' => $statusKolesterol,
            'statusIMT' => $statusIMT,
            'statusLingkarPerut' => $statusLingkarPerut,
            'statusTekananDarah' => $statusTekananDarah
        ]);

        // Tampilkan PDF
        return $pdf->stream('RekamMedis_' . $record->patient->nama_lengkap . '.pdf');
    }




    public function getHealthRecordsByMonth($patientId, Request $request)
    {
        $bulan = $request->input('month');
        $year = $request->input('year');

        if ($bulan) {
            $healthRecords = PatientRecord::where('patient_id', $patientId)
                ->whereMonth('record_date', Carbon::createFromFormat('F Y', $bulan)->month)
                ->whereYear('record_date', $year)
                ->orderByDesc('record_date')
                ->get();
        } else {
            $healthRecords = PatientRecord::where('patient_id', $patientId)->orderByDesc('record_date')->get();
        }

        $recordsHtml = view('partials.health_records', compact('healthRecords'))->render();

        return response()->json(compact('healthRecords', 'recordsHtml'));
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
}
