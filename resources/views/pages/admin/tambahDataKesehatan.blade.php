@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 mt-5">
    <h2 class="text-2xl font-bold mb-6">Tambah Data Kesehatan </h2>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 border border-red-400 rounded-md px-4 py-3 mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('storePatientRecord', $patient->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="record_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pemeriksaan</label>
                <input type="date" name="record_date" id="record_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>

            <div class="mb-4">
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 text-sm font-bold mb-2">Riwayat PTM Keluarga</label>
                <input type="text" name="riwayat_ptm_keluarga" id="riwayat_ptm_keluarga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 text-sm font-bold mb-2">Riwayat PTM Sendiri</label>
                <input type="text" name="riwayat_ptm_sendiri" id="riwayat_ptm_sendiri" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="merokok" class="block text-gray-700 text-sm font-bold mb-2">Merokok</label>
                <input type="text" name="merokok" id="merokok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="kurang_aktivitas_fisik" class="block text-gray-700 text-sm font-bold mb-2">Kurang Aktivitas Fisik</label>
                <input type="text" name="kurang_aktivitas_fisik" id="kurang_aktivitas_fisik" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="kurang_sayur_buah" class="block text-gray-700 text-sm font-bold mb-2">Kurang Sayur dan Buah</label>
                <input type="text" name="kurang_sayur_buah" id="kurang_sayur_buah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="konsumsi_alkohol" class="block text-gray-700 text-sm font-bold mb-2">Konsumsi Alkohol</label>
                <input type="text" name="konsumsi_alkohol" id="konsumsi_alkohol" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="berat_badan" class="block text-gray-700 text-sm font-bold mb-2">Berat Badan (kg)</label>
                <input type="number" name="berat_badan" id="berat_badan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tinggi_badan" class="block text-gray-700 text-sm font-bold mb-2">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" id="tinggi_badan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="indeks_massa_tubuh" class="block text-gray-700 text-sm font-bold mb-2">Indeks Massa Tubuh</label>
                <input type="number" name="indeks_massa_tubuh" id="indeks_massa_tubuh" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="lingkar_perut" class="block text-gray-700 text-sm font-bold mb-2">Lingkar Perut (cm)</label>
                <input type="number" name="lingkar_perut" id="lingkar_perut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tekanan_darah" class="block text-gray-700 text-sm font-bold mb-2">Tekanan Darah</label>
                <input type="text" name="tekanan_darah" id="tekanan_darah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="gula_darah_sewaktu" class="block text-gray-700 text-sm font-bold mb-2">Gula Darah Sewaktu (mg/dL)</label>
                <input type="number" name="gula_darah_sewaktu" id="gula_darah_sewaktu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="kolesterol_total" class="block text-gray-700 text-sm font-bold mb-2">Kolesterol Total (mg/dL)</label>
                <input type="number" name="kolesterol_total" id="kolesterol_total" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="masalah_kesehatan" class="block text-gray-700 text-sm font-bold mb-2">Masalah Kesehatan</label>
                <input type="text" name="masalah_kesehatan" id="masalah_kesehatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="obat_fasilitas" class="block text-gray-700 text-sm font-bold mb-2">Obat Fasilitas</label>
                <input type="text" name="obat_fasilitas" id="obat_fasilitas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tindak_lanjut" class="block text-gray-700 text-sm font-bold mb-2">Tindak Lanjut</label>
                <input type="text" name="tindak_lanjut" id="tindak_lanjut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
        </div>

        <div class="flex items-center justify-between mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
                
            </button>
        </div>
    </form>
</div>
@endsection
