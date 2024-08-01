@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-10 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-4xl font-bold text-center mb-8">Profil</h1>
        <p class="text-center text-xl mb-6">Data Diri & Riwayat Kesehatan</p>

        <div class="bg-lightblue rounded-lg shadow-md p-5 mb-8">
            <div class="flex items-center">
                <div class="bg-gray-300 rounded-full w-16 h-16 flex items-center justify-center">
                    @if ($pasien->foto)
                        <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" class="w-full rounded-full h-full object-cover">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Foto Default" class="w-full h-full rounded-full object-cover">
                    @endif
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-semibold">{{ $pasien->nama_lengkap }}</h2>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="border-b border-gray-200 mb-6 flex justify-between">
                <ul class="flex border-b">
                    <li class="mr-1">
                        <a href="#" class="py-2 px-4 block text-gray-600 font-semibold hover:text-blue-500"
                            id="dataDiriTab">
                            Data Diri
                        </a>
                    </li>
                    <li class="mr-1">
                        <a href="#" class="py-2 px-4 block text-gray-600 font-semibold hover:text-blue-500"
                            id="riwayatKesehatanTab">
                            Riwayat Kesehatan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Data Diri Content -->
            <div id="dataDiriContent">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ([
            'Nama' => $pasien->nama_lengkap,
            'NIK' => $pasien->nik,
            'Tanggal Lahir' => \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y'),
            'Jenis Kelamin' => $pasien->jenis_kelamin,
            'Agama' => $pasien->agama,
            'Alamat' => $pasien->alamat,
            'No Hp' => $pasien->no_hp,
            'Pendidikan Terakhir' => $pasien->pendidikan_terakhir,
            'Pekerjaan' => $pasien->pekerjaan,
            'Status Pernikahan' => $pasien->status_kawin,
            'Golongan Darah' => $pasien->gol_darah,
            'Email' => $pasien->email,
        ] as $label => $value)
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-1">{{ $label }}</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100 text-gray-700"
                                value="{{ $value }}" readonly>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Riwayat Kesehatan Content -->
            <div id="riwayatKesehatanContent" class="hidden">
                <h2 class="text-3xl font-semibold mb-2 mt-8 Mmb-4">Data Riwayat Kesehatan</h2>

                <div class="mb-4">
                    <label for="searchInput" class="block mb-4 text-xl font-medium text-gray-700 mt-4 ">Cari Data Riwayat
                        Kesehatan:</label>
                    <input type="text" id="searchInput" class="w-full px-4 py-2 border rounded-lg bg-gray-100"
                        placeholder="Cari data riwayat kesehatan...">
                </div>

                <!-- Export PDF Button -->
                <div class="mb-4">
                    <button id="exportPdfButton"
                        class="px-4 py-2 bg-lightblue text-black rounded-lg font-semibold hover:bg-[#55A6C8]">
                        Ekspor ke PDF
                    </button>
                </div>

                <div class="overflow-x-auto mt-6">
                    <table id="healthRecordsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal Rekam Medis</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Berat Badan (kg)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tinggi Badan (cm)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lingkar Perut (cm)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tekanan Darah (mmHg)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gula Darah Sewaktu (mg/dL)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kolesterol Total (mg/dL)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Riwayat PTM Keluarga</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Riwayat PTM Sendiri</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($healthRecords as $record)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($record->record_date)->format('d F Y') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->berat_badan }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->tinggi_badan }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->lingkar_perut }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->tekanan_darah_sistolik }} / {{ $record->tekanan_darah_diastolik }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->gula_darah_sewaktu }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->kolesterol_total }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->riwayat_ptm_keluarga }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->riwayat_ptm_sendiri }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="mailto:support@example.com"
                class="bg-[#55A6C8] hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">
                Hubungi Dukungan
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Restore the active tab from localStorage
            const activeTab = localStorage.getItem('activeTab') || 'dataDiri';
            if (activeTab === 'riwayatKesehatan') {
                showRiwayatKesehatan();
            } else {
                showDataDiri();
            }

            // Event listeners for tab clicks
            document.getElementById('dataDiriTab').addEventListener('click', showDataDiri);
            document.getElementById('riwayatKesehatanTab').addEventListener('click', showRiwayatKesehatan);

            function showDataDiri() {
                document.getElementById('dataDiriContent').style.display = 'block';
                document.getElementById('riwayatKesehatanContent').style.display = 'none';
                localStorage.setItem('activeTab', 'dataDiri');
            }

            function showRiwayatKesehatan() {
                document.getElementById('dataDiriContent').style.display = 'none';
                document.getElementById('riwayatKesehatanContent').style.display = 'block';
                localStorage.setItem('activeTab', 'riwayatKesehatan');
            }

            // Event listener for export to PDF button
            document.getElementById('exportPdfButton').addEventListener('click', exportToPdf);

            function exportToPdf() {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();

                doc.text('Data Riwayat Kesehatan', 14, 10);

                // Get the table
                const table = document.getElementById('healthRecordsTable');
                const rows = Array.from(table.querySelectorAll('tr'));
                const data = rows.map(row => {
                    const cells = row.querySelectorAll('th, td');
                    return Array.from(cells).map(cell => cell.textContent.trim());
                });

                doc.autoTable({
                    head: [data[0]], // Header
                    body: data.slice(1), // Body
                });

                doc.save('riwayat_kesehatan.pdf');
            }

            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#healthRecordsTable tbody tr');

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    let found = false;

                    cells.forEach(cell => {
                        if (cell.textContent.toLowerCase().includes(searchTerm)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
        