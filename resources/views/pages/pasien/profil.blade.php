@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-4xl font-bold text-center mb-8">Profil</h1>
        <p class="text-center text-xl mb-6">Data Diri & Riwayat Kesehatan</p>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
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
            <div class="border-b border-gray-200 mb-6">
                <ul class="flex justify-around">
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-gray-600 font-semibold hover:border-b-4 hover:border-blue-500" id="dataDiriTab" onclick="showDataDiri()">Data Diri</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-gray-600 font-semibold hover:border-b-4 hover:border-blue-500" id="riwayatKesehatanTab" onclick="showRiwayatKesehatan()">Riwayat Kesehatan</a>
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
                            <input type="text" class="w-full px-4 py-2 border rounded-lg" value="{{ $value }}" readonly>
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="riwayatKesehatanContent" class="hidden">
                <h2 class="text-lg font-semibold mb-2 mt-8">Data Riwayat Kesehatan</h2>

                <div class="mb-4">
                    <label for="filterTanggal" class="block mb-2 text-sm font-medium text-gray-700">Pilih Tanggal Pemeriksaan:</label>
                    <select id="filterTanggal" class="form-select mt-1 block w-full" onchange="filterByDate()">
                        <option value="">Semua Tanggal</option>
                        @foreach ($dates as $date)
                            <option value="{{ $date }}">{{ $date }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table id="healthRecordsTable" class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Tanggal Rekam Medis</th>
                                <th class="px-4 py-2 border">Berat Badan (kg)</th>
                                <th class="px-4 py-2 border">Tinggi Badan (cm)</th>
                                <th class="px-4 py-2 border">Lingkar Perut (cm)</th>
                                <th class="px-4 py-2 border">Tekanan Darah (mmHg)</th>
                                <th class="px-4 py-2 border">Gula Darah Sewaktu (mg/dL)</th>
                                <th class="px-4 py-2 border">Kolesterol Total (mg/dL)</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthRecords as $record)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $record->record_date->format('d F Y') }}</td>
                                    <td class="px-4 py-2 border">{{ $record->berat_badan }}</td>
                                    <td class="px-4 py-2 border">{{ $record->tinggi_badan }}</td>
                                    <td class="px-4 py-2 border">{{ $record->lingkar_perut }}</td>
                                    <td class="px-4 py-2 border">{{ $record->tekanan_darah }}</td>
                                    <td class="px-4 py-2 border">{{ $record->gula_darah_sewaktu }}</td>
                                    <td class="px-4 py-2 border">{{ $record->kolesterol_total }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="editHealthRecord({{ $record->id }})">Edit</button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="deleteHealthRecord({{ $record->id }})">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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

        function filterByDate() {
            var selectedDate = document.getElementById('filterTanggal').value;
            var url = selectedDate ? `/getHealthRecordsByDate/${selectedDate}` : '/getAllHealthRecords';
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    var tableBody = document.querySelector('#healthRecordsTable tbody');
                    tableBody.innerHTML = '';
                    data.forEach(record => {
                        var row = `<tr>
                            <td class="px-4 py-2 border">${record.record_date}</td>
                            <td class="px-4 py-2 border">${record.berat_badan}</td>
                            <td class="px-4 py-2 border">${record.tinggi_badan}</td>
                            <td class="px-4 py-2 border">${record.lingkar_perut}</td>
                            <td class="px-4 py-2 border">${record.tekanan_darah}</td>
                            <td class="px-4 py-2 border">${record.gula_darah_sewaktu}</td>
                            <td class="px-4 py-2 border">${record.kolesterol_total}</td>
                            <td class="px-4 py-2 border text-center">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="editHealthRecord(${record.id})">Edit</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="deleteHealthRecord(${record.id})">Hapus</button>
                            </td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                });
        }

        function editHealthRecord(id) {
            window.location.href = `/health-records/${id}/edit`;
        }

        function deleteHealthRecord(id) {
            if (confirm('Yakin ingin menghapus rekam medis ini?')) {
                fetch(`/health-records/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    if (response.ok) {
                        alert('Rekam medis berhasil dihapus');
                        location.reload();
                    } else {
                        alert('Gagal menghapus rekam medis');
                    }
                });
            }
        }
    </script>
@endsection
