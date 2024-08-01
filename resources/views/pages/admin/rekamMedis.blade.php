@extends('layouts.admin')

@section('title', 'Rekam Medis')

@section('content')
    <div class="container mx-auto px-4 py-6 mt-5">
        <nav class="text-md mb-4">
            <p class="text-primary font-semibold">Rekam Medis</p>
        </nav>
        <div class="flex items-center mb-4">
            <a href="{{ route('admin.patientRecords.create') }}" class="bg-lightblue text-black font-semibold py-2 px-4 rounded shadow-sm flex items-center hover:scale-110 transition duration-200">
                <i class="bi bi-person-plus-fill me-2"></i>
                Tambah Data
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table id="patientRecordsTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-lightblue text-gray-900 font-bold text-base">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Nama Klien</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">ID Klien (NIK)</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Tanggal Rekam</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Riwayat PTM Keluarga</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Riwayat PTM Sendiri</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Merokok</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Kurang Aktivitas Fisik</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Kurang Sayur/Buah</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Konsumsi Alkohol</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Asam Urat</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Berat Badan (kg)</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Tinggi Badan (cm)</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Lingkar Perut (cm)</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Tekanan Darah</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Indeks Massa Tubuh</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Gula Darah Sewaktu</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Kolesterol Total</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Masalah Kesehatan</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Obat</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Tindak Lanjut</th>
                        <th class="px-4 py-3 text-left text-sm font-bold uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($records as $record)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $record->patient->nama_lengkap }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->patient->nik }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->record_date }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->riwayat_ptm_keluarga ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->riwayat_ptm_sendiri ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->merokok ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->kurang_aktivitas_fisik ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->kurang_sayur_buah ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->konsumsi_alkohol ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->asam_urat ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->berat_badan ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->tinggi_badan ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->lingkar_perut ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->tekanan_darah_sistolik ?? '-' }} / {{ $record->tekanan_darah_diastolik ?? '-' }}</td>
                            <td>
                                @php
                                    $tinggi_badan_m = $record->tinggi_badan / 100;
                                    $imt = $record->berat_badan / ($tinggi_badan_m * $tinggi_badan_m);
                                @endphp
                                {{ number_format($imt, 2) }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->gula_darah_sewaktu ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->kolesterol_total ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->masalah_kesehatan ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->obat_fasilitas ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $record->tindak_lanjut ?? '-' }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="{{ route('admin.patientRecords.print', $record->id) }}" class="text-blue-500 hover:text-blue-600">
                                    <i class="bi bi-file-earmark-text-fill"></i> Cetak
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
