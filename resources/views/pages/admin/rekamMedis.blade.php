@extends('layouts.admin')

@section('title', 'Rekam Medis')

@section('content')
    <div class="container mx-auto px-4 py-6 mt-5">
        <nav class="text-md mb-4">
            <p class="text-primary">Rekam Medis</p>
        </nav>
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('admin.patientRecords.create') }}" class="btn btn-primary d-flex align-items-center shadow-sm">
                <i class="bi bi-person-plus-fill me-2"></i>
                Tambah Data
            </a>
        </div>

        <div class="table-responsive shadow rounded-lg overflow-auto">
            <table id="patientRecordsTable" class="table table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>ID Pasien (NIK)</th>
                        <th>Tanggal Rekam</th>
                        <th>Riwayat PTM Keluarga</th>
                        <th>Riwayat PTM Sendiri</th>
                        <th>Merokok</th>
                        <th>Kurang Aktivitas Fisik</th>
                        <th>Kurang Sayur/Buah</th>
                        <th>Konsumsi Alkohol</th>
                        <th>Stress</th>
                        <th>Berat Badan (kg)</th>
                        <th>indeks Massa Tubuh</th>
                        <th>Tinggi Badan (cm)</th>
                        <th>Lingkar Perut (cm)</th>
                        <th>Tekanan Darah Sistolik</th>
                        <th>Tekanan Darah Diastolik</th>
                        <th>Gula Darah Sewaktu</th>
                        <th>Kolesterol Total</th>
                        <th>Masalah Kesehatan</th>
                        <th>Obat Fasilitas</th>
                        <th>Tindak Lanjut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $record->patient->nama_lengkap }}</td>
                            <td>{{ $record->patient->nik }}</td>
                            <td>{{ $record->record_date }}</td>
                            <td>{{ $record->riwayat_ptm_keluarga ?? '-' }}</td>
                            <td>{{ $record->riwayat_ptm_sendiri ?? '-' }}</td>
                            <td>{{ $record->merokok ?? '-' }}</td>
                            <td>{{ $record->kurang_aktivitas_fisik ?? '-' }}</td>
                            <td>{{ $record->kurang_sayur_buah ?? '-' }}</td>
                            <td>{{ $record->konsumsi_alkohol ?? '-' }}</td>
                            <td>{{ $record->stress ?? '-' }}</td>
                            <td>{{ $record->berat_badan ?? '-' }}</td>
                            <td>
                                @php
                                    $tinggi_badan_m = $record->tinggi_badan / 100;
                                    $imt = $record->berat_badan / ($tinggi_badan_m * $tinggi_badan_m);
                                @endphp
                                {{ number_format($imt, 2) }}
                            </td>
                            <td>{{ $record->tinggi_badan ?? '-' }}</td>
                            <td>{{ $record->lingkar_perut ?? '-' }}</td>
                            <td>{{ $record->tekanan_darah_sistolik ?? '-' }}</td>
                            <td>{{ $record->tekanan_darah_diastolik ?? '-' }}</td>
                            <td>{{ $record->gula_darah_sewaktu ?? '-' }}</td>
                            <td>{{ $record->kolesterol_total ?? '-' }}</td>
                            <td>{{ $record->masalah_kesehatan ?? '-' }}</td>
                            <td>{{ $record->obat_fasilitas ?? '-' }}</td>
                            <td>{{ $record->tindak_lanjut ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.patientRecords.print', $record->id) }}" class="text-primary"><i
                                        class="bi bi-file-earmark-text-fill"></i> Cetak</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
