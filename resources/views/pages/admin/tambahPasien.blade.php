@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-2xl font-bold mb-6">Tambah Data Pasien</h2>
        <form action="{{ route('storePasien') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="nama_lengkap" class="block text-gray-700 font-bold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"
                    class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="nik" class="block text-gray-700 font-bold">NIK</label>
                <input type="text" id="nik" name="nik" class="w-full p-2 border border-gray-300 rounded mt-1"
                    required>
            </div>
            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-gray-700 font-bold">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="umur" class="block text-gray-700 font-bold">Umur</label>
                <input type="number" id="umur" name="umur" class="w-full p-2 border border-gray-300 rounded mt-1"
                    required>
            </div>
            <div class="mb-4">
                <label for="jenis_kelamin" class="block text-gray-700 font-bold">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="w-full p-2 border border-gray-300 rounded mt-1"
                    required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                <textarea id="alamat" name="alamat" class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block text-gray-700 font-bold">No HP</label>
                <input type="text" id="no_hp" name="no_hp" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="pendidikan_terakhir" class="block text-gray-700 font-bold">Pendidikan Terakhir</label>
                <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="pekerjaan" class="block text-gray-700 font-bold">Pekerjaan</label>
                <input type="text" id="pekerjaan" name="pekerjaan"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="status_kawin" class="block text-gray-700 font-bold">Status kawin</label>
                <select id="status_kawin" name="status_kawin" class="w-full p-2 border border-gray-300 rounded mt-1"
                    required>
                    <option value="Belum Nikah">Belum Nikah</option>
                    <option value="Menikah">Menikah</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="gol_darah" class="block text-gray-700 font-bold">Golongan Darah</label>
                <input type="text" id="gol_darah" name="gol_darah"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold">Email</label>
                <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 font-bold">Riwayat PTM Keluarga</label>
                <input type="text" id="riwayat_ptm_keluarga" name="riwayat_ptm_keluarga"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 font-bold">Riwayat PTM Sendiri</label>
                <input type="text" id="riwayat_ptm_sendiri" name="riwayat_ptm_sendiri"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="merokok" class="block text-gray-700 font-bold">Merokok</label>
                <input type="text" id="merokok" name="merokok"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kurang_aktivitas_fisik" class="block text-gray-700 font-bold">Kurang Aktivitas Fisik</label>
                <input type="text" id="kurang_aktivitas_fisik" name="kurang_aktivitas_fisik"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kurang_sayur_buah" class="block text-gray-700 font-bold">Kurang Sayur Buah</label>
                <input type="text" id="kurang_sayur_buah" name="kurang_sayur_buah"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="konsumsi_alkohol" class="block text-gray-700 font-bold">Konsumsi Alkohol</label>
                <input type="text" id="konsumsi_alkohol" name="konsumsi_alkohol"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="stress" class="block text-gray-700 font-bold">Stress</label>
                <input type="text" id="stress" name="stress"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="berat_badan" class="block text-gray-700 font-bold">Berat Badan</label>
                <input type="number" step="0.1" id="berat_badan" name="berat_badan"
                    class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="tinggi_badan" class="block text-gray-700 font-bold">Tinggi Badan</label>
                <input type="number" step="0.1" id="tinggi_badan" name="tinggi_badan"
                    class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="indeks_massa_tubuh" class="block text-gray-700 font-bold">Indeks Massa Tubuh</label>
                <input type="number" step="0.1" id="indeks_massa_tubuh" name="indeks_massa_tubuh"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="lingkar_perut" class="block text-gray-700 font-bold">Lingkar Perut</label>
                <input type="number" step="0.1" id="lingkar_perut" name="lingkar_perut"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="tekanan_darah" class="block text-gray-700 font-bold">Tekanan Darah</label>
                <input type="text" id="tekanan_darah" name="tekanan_darah"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="gula_darah_sewaktu" class="block text-gray-700 font-bold">Gula Darah Sewaktu</label>
                <input type="text" id="gula_darah_sewaktu" name="gula_darah_sewaktu"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="kolesterol_total" class="block text-gray-700 font-bold">Kolesterol Total</label>
                <input type="text" id="kolesterol_total" name="kolesterol_total"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="masalah_kesehatan" class="block text-gray-700 font-bold">Masalah Kesehatan yang
                    Ditemukan</label>
                <input type="text" id="masalah_kesehatan" name="masalah_kesehatan"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="obat_fasilitas" class="block text-gray-700 font-bold">Obat dan Fasilitas
                    Kesehatan/Dokter</label>
                <input type="text" id="obat_fasilitas" name="obat_fasilitas"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="tindak_lanjut" class="block text-gray-700 font-bold">Tindak Lanjut</label>
                <input type="text" id="tindak_lanjut" name="tindak_lanjut"
                    class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded" tambah-pasien>Tambah
                    Pasien</button>
            </div>
        </form>
    </div>

    @if (Session::has('message'))
        <script>
            swal.fire("Berhasil", "{{ Session::get('message') }}", 'success',{
                button:true,
                button: "OK",
                timer:3000,
            });
        </script>
    @endif
@endsection
