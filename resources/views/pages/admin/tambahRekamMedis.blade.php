@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 mt-5">
        <h2 class="text-3xl font-bold mb-6 text-gray-900">Tambah Data Rekam Medik</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 rounded-md px-4 py-3 mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('simpanData') }}" method="POST" class="bg-white shadow-md rounded-lg p-8 mb-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="record_date" class="block text-gray-700 text-sm font-medium mb-2">Tanggal Pemeriksaan</label>
                    <input type="date" name="record_date" id="record_date"
                        class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="flex items-center space-x-2">
                    <label for="nik" class="block text-gray-700 text-sm font-medium mb-2">NIK Pasien</label>
                    <input type="text" name="nik" id="nik"
                        class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required readonly>
                    <button type="button"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                        data-modal-target="patient-modal">Cari </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6 ">
                @foreach ([
            'riwayat_ptm_keluarga' => 'Penyakit Tidak Menular Keluarga',
            'riwayat_ptm_sendiri' => 'Penyakit Tidak Menular Sendiri',
            'merokok' => 'Merokok',
            'kurang_aktivitas_fisik' => 'Kurang Aktivitas Fisik',
            'kurang_sayur_buah' => 'Kurang Sayur dan Buah',
            'konsumsi_alkohol' => 'Konsumsi Alkohol',
            'berat_badan' => 'Berat Badan (kg)',
            'tinggi_badan' => 'Tinggi Badan (cm)',
            'lingkar_perut' => 'Lingkar Perut (cm)',
            'asam_urat' => 'asam urat',
            'tekanan_darah_sistolik' => 'Tekanan Darah Sistolik',
            'tekanan_darah_diastolik' => 'Tekanan Darah Diastolik',
            'gula_darah_sewaktu' => 'Gula Darah Sewaktu (mg/dL)',
            'gula_darah_puasa' => 'Gula Darah Puasa (mg/dL)',
            'kolesterol_total' => 'Kolesterol Total (mg/dL)',
            'masalah_kesehatan' => 'Masalah Kesehatan',
            'obat' => 'Obat ',
            'tindak_lanjut' => 'Tindak Lanjut',
        ] as $name => $label)
                    <div class="mb-4 ">
                        <label for="{{ $name }}"
                            class="block text-gray-700 text-sm font-semibold mb-2">{{ $label }} @if (in_array($name, [
                                    'berat_badan',
                                    'tinggi_badan',
                                    'lingkar_perut',
                                    'tekanan_darah',
                                    'tekanan_darah_sistolik',
                                    'tekanan_darah_diastolik',
                                ]))
                                <span class="text-red-400">*</span>
                            @endif
                        </label>
                        <input
                            type="{{ in_array($name, ['berat_badan', 'tinggi_badan', 'lingkar_perut', 'gula_darah_sewaktu', 'gula_darah_puasa', 'kolesterol_total']) ? 'number' : 'text' }}"
                            name="{{ $name }}" id="{{ $name }}"
                            class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="{{ $label }}">
                    </div>
                @endforeach
            </div>

            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">Tambah
                    Data</button>
                <a href="{{ route('rekamMedis') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">Batal</a>
            </div>
        </form>
    </div>


    <!-- Patient Modal -->
    <div id="patient-modal" class="fixed hidden inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl overflow-hidden">
            <div class="flex justify-between items-center border-b border-gray-200 px-6 py-4">
                <h2 class="text-xl font-semibold">Cari Pasien</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="closeModal('patient-modal')">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto max-h-[70vh] min-h-[70vh]"> <!-- Make content scrollable -->
                <input type="text" id="search"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-4"
                    placeholder="Cari berdasarkan NIK, Nama, atau Alamat">
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
                fetch('{{ route('admin.fetchPatients') }}?search=' + encodeURIComponent(search))
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
