@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 mt-5">
    <h2 class="text-2xl font-bold mb-6">Tambah Data Rekam Medik</h2>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 border border-red-400 rounded-md px-4 py-3 mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('simpanData') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4 flex flex-row justify-between">
            <div class="mb-4">
                <label for="record_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Pemeriksaan</label>
                <input type="date" name="record_date" id="record_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4 flex justify-between ">
                <input type="text" name="nik" id="nik" class="shadow appearance-none border rounded w-auto px-3 font-bold leading-tight focus:outline-none focus:shadow-outline" required readonly>
                <button type="button" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded" data-modal-target="patient-modal">Cari NIK Pasien</button>
            </div>
            
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div class="mb-4">
                <label for="riwayat_ptm_keluarga" class="block text-gray-700 text-sm font-bold mb-2">Penyakit Tidak Menular Keluarga</label>
                <input type="text" name="riwayat_ptm_keluarga" id="riwayat_ptm_keluarga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="riwayat_ptm_sendiri" class="block text-gray-700 text-sm font-bold mb-2">Penyakit Tidak Menular Sendiri</label>
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
                <label for="berat_badan" class="block text-gray-700 text-sm font-bold mb-2">Berat Badan (kg) <span class=" text-red-400">*</span> </label>
                <input type="number" name="berat_badan" id="berat_badan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tinggi_badan" class="block text-gray-700 text-sm font-bold mb-2">Tinggi Badan (cm) <span class=" text-red-400">*</span> </label>
                <input type="number" name="tinggi_badan" id="tinggi_badan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="indeks_massa_tubuh" class="block text-gray-700 text-sm font-bold mb-2">Indeks Massa Tubuh <span class=" text-red-400">*</span> </label>
                <input type="number" name="indeks_massa_tubuh" id="indeks_massa_tubuh" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="lingkar_perut" class="block text-gray-700 text-sm font-bold mb-2">Lingkar Perut (cm) <span class=" text-red-400">*</span> </label>
                <input type="number" name="lingkar_perut" id="lingkar_perut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="tekanan_darah" class="block text-gray-700 text-sm font-bold mb-2">Tekanan Darah <span class=" text-red-400">*</span> </label>
                <input type="text" name="tekanan_darah" id="tekanan_darah" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="tekanan_darah_sistolik" class="block text-gray-700 text-sm font-bold mb-2">Tekanan Darah Sistolik<span class=" text-red-400">*</span> </label>
                <input type="text" name="tekanan_darah_sistolik" id="tekanan_darah_sistolik" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="tekanan_darah_diastolik" class="block text-gray-700 text-sm font-bold mb-2">Tekanan Darah Diastolik<span class=" text-red-400">*</span> </label>
                <input type="text" name="tekanan_darah_diastolik" id="tekanan_darah_diastolik" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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

        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Data</button>
            <a href="{{ route('rekamMedis') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">Batal</a>
        </div>
    </form>
</div>

<!-- Patient Modal -->
<div id="patient-modal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl">
        <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
            <h2 class="text-xl font-semibold">Cari Pasien</h2>
            <button class="text-gray-600 hover:text-gray-800" onclick="closeModal('patient-modal')">&times;</button>
        </div>
        <div class="p-6">
            <input type="text" id="search" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4" placeholder="Cari berdasarkan NIK, Nama, atau Alamat">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nama Lengkap</th>
                        <th class="py-2 px-4 border-b">NIK</th>
                        <th class="py-2 px-4 border-b">Alamat</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody id="patient-list">
                    <!-- Patient rows will be appended here via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const patientList = document.getElementById('patient-list');

    function fetchPatients(search = '') {
        fetch('{{ route("admin.fetchPatients") }}?search=' + encodeURIComponent(search))
            .then(response => response.json())
            .then(data => {
                patientList.innerHTML = '';

                data.forEach(patient => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="py-2 px-4 border-b">${patient.nama_lengkap}</td>
                        <td class="py-2 px-4 border-b">${patient.nik}</td>
                        <td class="py-2 px-4 border-b">${patient.alamat}</td>
                        <td class="py-2 px-4 border-b"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="selectPatient('${patient.nik}')">Pilih</button></td>
                    `;
                    patientList.appendChild(row);
                });
            });
    }

    document.getElementById('search').addEventListener('input', function() {
        const search = this.value;
        fetchPatients(search);
    });

    document.querySelectorAll('[data-modal-target]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-target');
            document.getElementById(modalId).classList.remove('hidden');
            fetchPatients(); // Fetch all patients when modal opens
        });
    });

    window.selectPatient = function(nik) {
        document.getElementById('nik').value = nik;
        closeModal('patient-modal');
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
});
</script>
@endsection
