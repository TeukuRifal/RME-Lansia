@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <form action="{{ route('updateRiwayat', ['record_id' => $riwayat->id ?? '']) }}" method="POST" class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-2">Edit Riwayat Kesehatan</h2>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        @csrf
        @method('PUT') <!-- Add hidden input for PUT method -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="record_date" class="block text-gray-700 font-bold">Tanggal Rekam</label>
                <input type="date" id="record_date" name="record_date" value="{{ $riwayat->record_date ?? old('record_date') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 font-bold">Riwayat PTM Keluarga</label>
                <input type="text" id="riwayat_ptm_keluarga" name="riwayat_ptm_keluarga" value="{{ $riwayat->riwayat_ptm_keluarga ?? old('riwayat_ptm_keluarga') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 font-bold">Riwayat PTM Sendiri</label>
                <input type="text" id="riwayat_ptm_sendiri" name="riwayat_ptm_sendiri" value="{{ $riwayat->riwayat_ptm_sendiri ?? old('riwayat_ptm_sendiri') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="merokok" class="block text-gray-700 font-bold">Merokok</label>
                <input type="text" id="merokok" name="merokok" value="{{ $riwayat->merokok ?? old('merokok') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kurang_aktivitas_fisik" class="block text-gray-700 font-bold">Kurang Aktivitas Fisik</label>
                <input type="text" id="kurang_aktivitas_fisik" name="kurang_aktivitas_fisik" value="{{ $riwayat->kurang_aktivitas_fisik ?? old('kurang_aktivitas_fisik') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kurang_sayur_buah" class="block text-gray-700 font-bold">Kurang Sayur Buah</label>
                <input type="text" id="kurang_sayur_buah" name="kurang_sayur_buah" value="{{ $riwayat->kurang_sayur_buah ?? old('kurang_sayur_buah') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="konsumsi_alkohol" class="block text-gray-700 font-bold">Konsumsi Alkohol</label>
                <input type="text" id="konsumsi_alkohol" name="konsumsi_alkohol" value="{{ $riwayat->konsumsi_alkohol ?? old('konsumsi_alkohol') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="berat_badan" class="block text-gray-700 font-bold">Berat Badan</label>
                <input type="number" id="berat_badan" name="berat_badan" value="{{ $riwayat->berat_badan ?? old('berat_badan') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="tinggi_badan" class="block text-gray-700 font-bold">Tinggi Badan</label>
                <input type="number" id="tinggi_badan" name="tinggi_badan" value="{{ $riwayat->tinggi_badan ?? old('tinggi_badan') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="indeks_massa_tubuh" class="block text-gray-700 font-bold">Indeks Massa Tubuh</label>
                <input type="number" id="indeks_massa_tubuh" name="indeks_massa_tubuh" value="{{ $riwayat->indeks_massa_tubuh ?? old('indeks_massa_tubuh') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="lingkar_perut" class="block text-gray-700 font-bold">Lingkar Perut</label>
                <input type="number" id="lingkar_perut" name="lingkar_perut" value="{{ $riwayat->lingkar_perut ?? old('lingkar_perut') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="tekanan_darah" class="block text-gray-700 font-bold">Tekanan Darah</label>
                <input type="text" id="tekanan_darah" name="tekanan_darah" value="{{ $riwayat->tekanan_darah_sistolik ?? old('tekanan_darah_sistolik') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="tekanan_darah_sistolik" class="block text-gray-700 font-bold">Tekanan Darah Sistolik</label>
                <input type="text" id="tekanan_darah_sistolik" name="tekanan_darah_sistolik" value="{{ $riwayat->tekanan_darah ?? old('tekanan_darah') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="tekanan_darah_sistolik" class="block text-gray-700 font-bold">Tekanan Darah Sistolik</label>
                <input type="text" id="tekanan_darah_sistolik" name="tekanan_darah_sistolik" value="{{ $riwayat->tekanan_darah ?? old('tekanan_darah') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label for="gula_darah_sewaktu" class="block text-gray-700 font-bold">Gula Darah Sewaktu</label>
                <input type="number" id="gula_darah_sewaktu" name="gula_darah_sewaktu" value="{{ $riwayat->gula_darah_sewaktu ?? old('gula_darah_sewaktu') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kolesterol_total" class="block text-gray-700 font-bold">Kolesterol Total</label>
                <input type="number" id="kolesterol_total" name="kolesterol_total" value="{{ $riwayat->kolesterol_total ?? old('kolesterol_total') }}" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="masalah_kesehatan" class="block text-gray-700 font-bold">Masalah Kesehatan</label>
                <textarea id="masalah_kesehatan" name="masalah_kesehatan" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">{{ $riwayat->masalah_kesehatan ?? old('masalah_kesehatan') }}</textarea>
            </div>
            <div>
                <label for="obat_fasilitas_kesehatan" class="block text-gray-700 font-bold">Obat dan Fasilitas Kesehatan</label>
                <textarea id="obat_fasilitas_kesehatan" name="obat_fasilitas_kesehatan" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">{{ $riwayat->obat_fasilitas ?? old('obat_fasilitas_kesehatan') }}</textarea>
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-200">Simpan Perubahan</button>
            <a href="{{ route('healthHistory', ['patient_id' => $riwayat->patient_id ?? '']) }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">Batal</a>
            
        </div>
    </form>
</div>
@endsection
