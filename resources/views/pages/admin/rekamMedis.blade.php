@extends('layouts.admin')

@section('title', 'Rekam Medis')

@section('content')
    <div class="container mx-auto px-4 py-6 mt-5">
        <nav class="text-md mb-4">
            <p class="text-blue-500">Rekam Medis</p>
        </nav>
        <div class="flex justify-between items-center mb-6 p-2">
            <a href="{{ route('admin.patientRecords.create') }}"
                class="flex items-center bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">
                <img src="{{ asset('images/addPasien.png') }}" alt="tambah pasien" class="w-5 h-5 mr-2">
                Tambah Data
            </a>
        </div>


        <!-- Tabel Daftar Riwayat Pasien -->
        <div class="table-responsive shadow rounded-lg overflow-auto">
            <table id="patientRecordsTable" class="min-w-full bg-white shadow-md overflow-hidden">
                <thead class=" align-middle justify-center border">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Pasien</th>
                        <th class="py-3 px-4">ID Pasien(NIK)</th>
                        <th class="py-3 px-4">Tanggal Rekam</th>
                        <th class="py-3 px-4">Riwayat PTM Keluarga</th>
                        <th class="py-3 px-4">Riwayat PTM Sendiri</th>
                        <th class="py-3 px-4">Merokok</th>
                        <th class="py-3 px-4">Kurang Aktivitas Fisik</th>
                        <th class="py-3 px-4">Kurang Sayur/Buah</th>
                        <th class="py-3 px-4">Konsumsi Alkohol</th>
                        <th class="py-3 px-4">Stress</th>
                        <th class="py-3 px-4">Berat Badan (kg)</th>
                        <th class="py-3 px-4">Tinggi Badan (cm)</th>
                        <th class="py-3 px-4">IMT</th>
                        <th class="py-3 px-4">Lingkar Perut (cm)</th>
                        <th class="py-3 px-4">Tekanan Darah</th>
                        <th class="py-3 px-4">Tekanan Darah Sistolik</th>
                        <th class="py-3 px-4">Tekanan Darah Diastolik</th>
                        <th class="py-3 px-4">Gula Darah Sewaktu</th>
                        <th class="py-3 px-4">Kolesterol Total</th>
                        <th class="py-3 px-4">Masalah Kesehatan</th>
                        <th class="py-3 px-4">Obat Fasilitas</th>
                        <th class="py-3 px-4">Tindak Lanjut</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $record->patient->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $record->patient->nik }}</td>
                            <td class="py-3 px-4">{{ $record->record_date }}</td>
                            <td class="py-3 px-4">{{ $record->riwayat_ptm_keluarga ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->riwayat_ptm_sendiri ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->merokok ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->kurang_aktivitas_fisik ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->kurang_sayur_buah ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->konsumsi_alkohol ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->stress ? 'Ya' : 'Tidak' }}</td>
                            <td class="py-3 px-4">{{ $record->berat_badan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tinggi_badan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->indeks_massa_tubuh ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->lingkar_perut ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah_sistolik ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah_diastolik ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->gula_darah_sewaktu ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->kolesterol_total ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->masalah_kesehatan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->obat_fasilitas ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tindak_lanjut ?? '-' }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('print', $record->id) }}" class="text-blue-500 hover:text-blue-700">Lihat</a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
