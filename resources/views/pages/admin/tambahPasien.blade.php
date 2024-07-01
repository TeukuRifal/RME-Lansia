@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    
    <form action="{{ route('storePasien') }}" method="POST" class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-2">Tambah Data Pasien</h2>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        @csrf
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Ada kesalahan!</strong>
                <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama_lengkap" class="block text-gray-700 font-bold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="nik" class="block text-gray-700 font-bold">NIK</label>
                <input type="text" id="nik" name="nik" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="tanggal_lahir" class="block text-gray-700 font-bold">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="umur" class="block text-gray-700 font-bold">Umur</label>
                <input type="number" id="umur" name="umur" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-gray-700 font-bold">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div>
                <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                <textarea id="alamat" name="alamat" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200"></textarea>
            </div>
            <div>
                <label for="no_hp" class="block text-gray-700 font-bold">No HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="pendidikan_terakhir" class="block text-gray-700 font-bold">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="pekerjaan" class="block text-gray-700 font-bold">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="status_kawin" class="block text-gray-700 font-bold">Status Kawin</label>
                <select id="status_kawin" name="status_kawin" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    <option value="Belum Nikah">Belum Nikah</option>
                    <option value="Menikah">Menikah</option>
                </select>
            </div>
            <div>
                <label for="gol_darah" class="block text-gray-700 font-bold">Golongan Darah</label>
                <input type="text" id="gol_darah" name="gol_darah" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 font-bold">Riwayat PTM Keluarga (Penyakit Tidak Menular)</label>
                <input type="text" id="riwayat_ptm_keluarga" name="riwayat_ptm_keluarga" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 font-bold">Riwayat PTM Sendiri (Penyakit Tidak Menular)</label>
                <input type="text" id="riwayat_ptm_sendiri" name="riwayat_ptm_sendiri" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="merokok" class="block text-gray-700 font-bold">Merokok</label>
                <input type="text" id="merokok" name="merokok" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kurang_aktivitas_fisik" class="block text-gray-700 font-bold">Kurang Aktivitas Fisik</label>
                <input type="text" id="kurang_aktivitas_fisik" name="kurang_aktivitas_fisik" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kurang_sayur_buah" class="block text-gray-700 font-bold">Kurang Sayur Buah</label>
                <input type="text" id="kurang_sayur_buah" name="kurang_sayur_buah" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="konsumsi_alkohol" class="block text-gray-700 font-bold">Konsumsi Alkohol</label>
                <input type="text" id="konsumsi_alkohol" name="konsumsi_alkohol" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="stress" class="block text-gray-700 font-bold">Stress</label>
                <input type="text" id="stress" name="stress" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="berat_badan" class="block text-gray-700 font-bold">Berat Badan</label>
                <input type="number" step="0.1" id="berat_badan" name="berat_badan" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="tinggi_badan" class="block text-gray-700 font-bold">Tinggi Badan</label>
                <input type="number" step="0.1" id="tinggi_badan" name="tinggi_badan" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
            </div>
            <div>
                <label for="indeks_massa_tubuh" class="block text-gray-700 font-bold">Indeks Massa Tubuh</label>
                <input type="number" step="0.1" id="indeks_massa_tubuh" name="indeks_massa_tubuh" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="lingkar_perut" class="block text-gray-700 font-bold">Lingkar Perut</label>
                <input type="number" step="0.1" id="lingkar_perut" name="lingkar_perut" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="tekanan_darah" class="block text-gray-700 font-bold">Tekanan Darah</label>
                <input type="text" id="tekanan_darah" name="tekanan_darah" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="gula_darah_sewaktu" class="block text-gray-700 font-bold">Gula Darah Sewaktu</label>
                <input type="number" step="0.1" id="gula_darah_sewaktu" name="gula_darah_sewaktu" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label for="kolesterol" class="block text-gray-700 font-bold">Kolesterol</label>
                <input type="number" step="0.1" id="kolesterol" name="kolesterol" class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
            </div>
        </div>
        <div class="mt-4">
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-700">Tambah Data</button>
        </div>
    </form>
</div>
@endsection
