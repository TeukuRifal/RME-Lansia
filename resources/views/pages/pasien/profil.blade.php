@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-4xl font-bold text-center mb-8">Profil</h1>
        <p class="text-center text-xl mb-6">Data Diri & Riwayat Kesehatan</p>

        <div class="bg-blue-200 rounded-lg shadow-md p-6 mb-8">
            <div class="flex items-center">
                <div class="bg-gray-300 rounded-full w-24 h-24 flex items-center justify-center">
                    <img src="https://via.placeholder.com/100" alt="User Image" class="rounded-full">
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-semibold">{{ $pasien->nama_lengkap }}</h2>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="border-b border-gray-200 mb-6 justify-between flex">
                <ul class="flex border-b">
                    <li class="mr-1">
                        <a href="#" class="py-2 px-4 block text-gray-600 font-semibold hover:text-blue-500" id="dataDiriTab" onclick="showDataDiri()">Data Diri</a>
                    </li>
                    <li class="mr-1">
                        <a href="#" class="py-2 px-4 block text-gray-600 font-semibold hover:text-blue-500" id="riwayatKesehatanTab" onclick="showRiwayatKesehatan()">Riwayat Kesehatan</a>
                    </li>
                </ul>
            </div>

            <div id="dataDiriContent">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ([
                        'Nama' => $pasien->nama_lengkap,
                        'NIK' => $pasien->nik,
                        'Tanggal Lahir' => $pasien->tanggal_lahir,
                        'Jenis Kelamin' => $pasien->jenis_kelamin,
                        'Agama' => $pasien->agama,
                        'Alamat' => $pasien->alamat,
                        'No Hp' => $pasien->no_hp,
                        'Pendidikan Terakhir' => $pasien->pendidikan_terakhir,
                        'Pekerjaan' => $pasien->pekerjaan,
                        'Status Pernikahan' => $pasien->status_kawin,
                        'Golongan Darah' => $pasien->gol_darah,
                        'Email' => $pasien->email
                    ] as $label => $value)
                        <div>
                            <label class="block text-gray-700">{{ $label }}</label>
                            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100 text-gray-700" value="{{ $value }}" readonly>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="riwayatKesehatanContent" class="hidden">
                <h2 class="text-lg font-semibold mb-2 mt-8">Data Riwayat Kesehatan</h2>

                <div class="mb-4">
                    <label for="searchInput" class="block mb-2 text-sm font-medium text-gray-700">Cari Data Riwayat Kesehatan:</label>
                    <input type="text" id="searchInput" class="w-full px-4 py-2 border rounded-lg bg-gray-100" placeholder="Cari data riwayat kesehatan...">
                </div>

                <div class="overflow-x-auto mt-6">
                    <table id="healthRecordsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Rekam Medis</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan (kg)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan (cm)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lingkar Perut (cm)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tekanan Darah (mmHg)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gula Darah Sewaktu (mg/dL)</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kolesterol Total (mg/dL)</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($healthRecords as $record)
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->record_date->format('d F Y') }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->berat_badan }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->tinggi_badan }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->lingkar_perut }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->tekanan_darah }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->gula_darah_sewaktu }}</td>
                                    <td class="px-4 py-2 text-sm text-gray-500">{{ $record->kolesterol_total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="mailto:support@example.com" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Hubungi Dukungan
            </a>
        </div>
    </div>

    <script>
        function showDataDiri() {
            document.getElementById('dataDiriContent').style.display = 'block';
            document.getElementById('riwayatKesehatanContent').style.display = 'none';
            document.getElementById('dataDiriTab').classList.add('border-b-4', 'border-blue-500');
            document.getElementById('riwayatKesehatanTab').classList.remove('border-b-4', 'border-blue-500');
        }

        function showRiwayatKesehatan() {
            document.getElementById('dataDiriContent').style.display = 'none';
            document.getElementById('riwayatKesehatanContent').style.display = 'block';
            document.getElementById('dataDiriTab').classList.remove('border-b-4', 'border-blue-500');
            document.getElementById('riwayatKesehatanTab').classList.add('border-b-4', 'border-blue-500');
        }

        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#healthRecordsTable tbody tr');
            rows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                const text = Array.from(cells).map(cell => cell.textContent.toLowerCase()).join(' ');
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    </script>
@endsection
