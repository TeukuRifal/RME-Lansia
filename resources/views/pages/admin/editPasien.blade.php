@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-2xl font-bold mb-6">Edit Data Pasien</h2>
        <form action="{{ route('updatePasien', $patient->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="nama_lengkap" class="block text-gray-700 font-bold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $patient->nama_lengkap }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="nik" class="block text-gray-700 font-bold">NIK</label>
                <input type="text" id="nik" name="nik" value="{{ $patient->nik }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 font-bold">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $patient->tanggal_lahir }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="umur" class="block text-gray-700 font-bold">Umur</label>
                <input type="number" id="umur" name="umur" value="{{ $patient->umur }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700 font-bold">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="{{ $patient->jenis_kelamin }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                <textarea id="alamat" name="alamat" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->alamat }}</textarea>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block text-gray-700 font-bold">No HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ $patient->no_hp }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="pendidikan_terakhir" class="block text-gray-700 font-bold">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $patient->pendidikan_terakhir }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="pekerjaan" class="block text-gray-700 font-bold">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $patient->pekerjaan }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="status_kawin" class="block text-gray-700 font-bold">Status Kawin</label>
                <input type="text" id="status_kawin" name="status_kawin" value="{{ $patient->status_kawin }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="gol_darah" class="block text-gray-700 font-bold">Gol. Darah</label>
                <input type="text" id="gol_darah" name="gol_darah" value="{{ $patient->gol_darah }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input type="email" id="email" name="email" value="{{ $patient->email }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 font-bold">Riwayat PTM Keluarga</label>
                <textarea id="riwayat_ptm_keluarga" name="riwayat_ptm_keluarga" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->riwayat_ptm_keluarga }}</textarea>
            </div>
            <div class="mb-4">
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 font-bold">Riwayat PTM Sendiri</label>
                <textarea id="riwayat_ptm_sendiri" name="riwayat_ptm_sendiri" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->riwayat_ptm_sendiri }}</textarea>
            </div>
            <div class="mb-4">
                <label for="merokok" class="block text-gray-700 font-bold">Merokok</label>
                <input type="text" id="merokok" name="merokok" value="{{ $patient->merokok }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kurang_aktivitas_fisik" class="block text-gray-700 font-bold">Kurang Aktivitas Fisik</label>
                <input type="text" id="kurang_aktivitas_fisik" name="kurang_aktivitas_fisik" value="{{ $patient->kurang_aktivitas_fisik }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kurang_sayur_buah" class="block text-gray-700 font-bold">Kurang Sayur Buah</label>
                <input type="text" id="kurang_sayur_buah" name="kurang_sayur_buah" value="{{ $patient->kurang_sayur_buah }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="konsumsi_alkohol" class="block text-gray-700 font-bold">Konsumsi Alkohol</label>
                <input type="text" id="konsumsi_alkohol" name="konsumsi_alkohol" value="{{ $patient->konsumsi_alkohol }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="stress" class="block text-gray-700 font-bold">Stress</label>
                <input type="text" id="stress" name="stress" value="{{ $patient->stress }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="berat_badan" class="block text-gray-700 font-bold">Berat Badan</label>
                <input type="number" id="berat_badan" name="berat_badan" value="{{ $patient->berat_badan }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="tinggi_badan" class="block text-gray-700 font-bold">Tinggi Badan</label>
                <input type="number" id="tinggi_badan" name="tinggi_badan" value="{{ $patient->tinggi_badan }}" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="indeks_massa_tubuh" class="block text-gray-700 font-bold">Indeks Massa Tubuh</label>
                <input type="number" step="0.01" id="indeks_massa_tubuh" name="indeks_massa_tubuh" value="{{ $patient->indeks_massa_tubuh }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="lingkar_perut" class="block text-gray-700 font-bold">Lingkar Perut</label>
                <input type="number" id="lingkar_perut" name="lingkar_perut" value="{{ $patient->lingkar_perut }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="tekanan_darah" class="block text-gray-700 font-bold">Tekanan Darah</label>
                <input type="text" id="tekanan_darah" name="tekanan_darah" value="{{ $patient->tekanan_darah }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="gula_darah_sewaktu" class="block text-gray-700 font-bold">Gula Darah Sewaktu</label>
                <input type="text" id="gula_darah_sewaktu" name="gula_darah_sewaktu" value="{{ $patient->gula_darah_sewaktu }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kolesterol_total" class="block text-gray-700 font-bold">Kolesterol Total</label>
                <input type="text" id="kolesterol_total" name="kolesterol_total" value="{{ $patient->kolesterol_total }}" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="masalah_kesehatan" class="block text-gray-700 font-bold">Masalah Kesehatan</label>
                <textarea id="masalah_kesehatan" name="masalah_kesehatan" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->masalah_kesehatan }}</textarea>
            </div>
            <div class="mb-4">
                <label for="obat_fasilitas" class="block text-gray-700 font-bold">Obat & Fasilitas</label>
                <textarea id="obat_fasilitas" name="obat_fasilitas" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->obat_fasilitas }}</textarea>
            </div>
            <div class="mb-4">
                <label for="tindak_lanjut" class="block text-gray-700 font-bold">Tindak Lanjut</label>
                <textarea id="tindak_lanjut" name="tindak_lanjut" class="w-full p-2 border border-gray-300 rounded mt-1">{{ $patient->tindak_lanjut }}</textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Pasien</button>
            </div>
        </form>
    </div>
@endsection
