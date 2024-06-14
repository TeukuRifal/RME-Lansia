@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-2xl font-bold mb-6">Daftar Pasien</h2>
        <!-- Tabel Daftar Pasien -->
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-blue-400 border">No</th>
                    <th class="py-2 px-4 bg-blue-400 border">Nama Lengkap</th>
                    <th class="py-2 px-4 bg-blue-400 border">NIK</th>
                    <th class="py-2 px-4 bg-blue-400 border">Tanggal Lahir</th>
                    <th class="py-2 px-4 bg-blue-400 border">Umur</th>
                    <th class="py-2 px-4 bg-blue-400 border">Jenis Kelamin</th>
                    <th class="py-2 px-4 bg-blue-400 border">Alamat</th>
                    <th class="py-2 px-4 bg-blue-400 border">No HP</th>
                    <th class="py-2 px-4 bg-blue-400 border">Pendidikan Terakhir</th>
                    <th class="py-2 px-4 bg-blue-400 border">Pekerjaan</th>
                    <th class="py-2 px-4 bg-blue-400 border">Status Kawin</th>
                    <th class="py-2 px-4 bg-blue-400 border">Gol. Darah</th>
                    <th class="py-2 px-4 bg-blue-400 border">Email</th>
                    <th class="py-2 px-4 bg-blue-400 border">Riwayat PTM Keluarga</th>
                    <th class="py-2 px-4 bg-blue-400 border">Riwayat PTM Sendiri</th>
                    <th class="py-2 px-4 bg-blue-400 border">Merokok</th>
                    <th class="py-2 px-4 bg-blue-400 border">Kurang Aktivitas Fisik</th>
                    <th class="py-2 px-4 bg-blue-400 border">Kurang Sayur Buah</th>
                    <th class="py-2 px-4 bg-blue-400 border">Konsumsi Alkohol</th>
                    <th class="py-2 px-4 bg-blue-400 border">Stress</th>
                    <th class="py-2 px-4 bg-blue-400 border">Berat Badan</th>
                    <th class="py-2 px-4 bg-blue-400 border">Tinggi Badan</th>
                    <th class="py-2 px-4 bg-blue-400 border">Indeks Massa Tubuh</th>
                    <th class="py-2 px-4 bg-blue-400 border">Lingkar Perut</th>
                    <th class="py-2 px-4 bg-blue-400 border">Tekanan Darah</th>
                    <th class="py-2 px-4 bg-blue-400 border">Gula Darah Sewaktu</th>
                    <th class="py-2 px-4 bg-blue-400 border">Kolesterol Total</th>
                    <th class="py-2 px-4 bg-blue-400 border">Masalah Kesehatan</th>
                    <th class="py-2 px-4 bg-blue-400 border">Obat & Fasilitas</th>
                    <th class="py-2 px-4 bg-blue-400 border">Tindak Lanjut</th>
                    <th class="py-2 px-4 bg-blue-400 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($patients as $patient)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border">{{ $patient->nama_lengkap }}</td>
                    <td class="py-2 px-4 border">{{ $patient->nik }}</td>
                    <td class="py-2 px-4 border">{{ $patient->tanggal_lahir }}</td>
                    <td class="py-2 px-4 border">{{ $patient->umur }}</td>
                    <td class="py-2 px-4 border">{{ $patient->jenis_kelamin }}</td>
                    <td class="py-2 px-4 border">{{ $patient->alamat }}</td>
                    <td class="py-2 px-4 border">{{ $patient->no_hp }}</td>
                    <td class="py-2 px-4 border">{{ $patient->pendidikan_terakhir }}</td>
                    <td class="py-2 px-4 border">{{ $patient->pekerjaan }}</td>
                    <td class="py-2 px-4 border">{{ $patient->status_kawin }}</td>
                    <td class="py-2 px-4 border">{{ $patient->gol_darah }}</td>
                    <td class="py-2 px-4 border">{{ $patient->email }}</td>
                    <td class="py-2 px-4 border">{{ $patient->riwayat_ptm_keluarga }}</td>
                    <td class="py-2 px-4 border">{{ $patient->riwayat_ptm_sendiri }}</td>
                    <td class="py-2 px-4 border">{{ $patient->merokok }}</td>
                    <td class="py-2 px-4 border">{{ $patient->kurang_aktivitas_fisik }}</td>
                    <td class="py-2 px-4 border">{{ $patient->kurang_sayur_buah }}</td>
                    <td class="py-2 px-4 border">{{ $patient->konsumsi_alkohol }}</td>
                    <td class="py-2 px-4 border">{{ $patient->stress }}</td>
                    <td class="py-2 px-4 border">{{ $patient->berat_badan }}</td>
                    <td class="py-2 px-4 border">{{ $patient->tinggi_badan }}</td>
                    <td class="py-2 px-4 border">{{ $patient->indeks_massa_tubuh }}</td>
                    <td class="py-2 px-4 border">{{ $patient->lingkar_perut }}</td>
                    <td class="py-2 px-4 border">{{ $patient->tekanan_darah }}</td>
                    <td class="py-2 px-4 border">{{ $patient->gula_darah_sewaktu }}</td>
                    <td class="py-2 px-4 border">{{ $patient->kolesterol_total }}</td>
                    <td class="py-2 px-4 border">{{ $patient->masalah_kesehatan }}</td>
                    <td class="py-2 px-4 border">{{ $patient->obat_fasilitas }}</td>
                    <td class="py-2 px-4 border">{{ $patient->tindak_lanjut }}</td>
                    <td class="py-2 px-4 border">
                        <a href="{{ route('editPasien', $patient->id) }}" class="bg-blue-500 px-2 rounded-lg font-bold">Edit</a>
                        <a href="{{ route('deletePasien', $patient->id) }}" class="bg-red-500 px-2 rounded-lg font-bold">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
