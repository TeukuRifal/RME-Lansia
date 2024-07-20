@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-4xl font-bold text-center mb-8">Profil</h1>
        <p class="text-center text-xl mb-6">Data Diri - Riwayat Kesehatan</p>

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
                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama" value="{{ $pasien->nama_lengkap }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="NIK" value="{{ $pasien->nik }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Tanggal Lahir</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Tanggal Lahir" value="{{ $pasien->tanggal_lahir }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Umur</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Umur" value="{{ $pasien->umur }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Jenis Kelamin</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Jenis Kelamin" value="{{ $pasien->jenis_kelamin }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Agama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Agama" value="{{ $pasien->agama }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Alamat</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Alamat" value="{{ $pasien->alamat }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">No Hp</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="No Hp" value="{{ $pasien->no_hp }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Pendidikan Terakhir</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Pendidikan Terakhir" value="{{ $pasien->pendidikan_terakhir }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Pekerjaan</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Pekerjaan" value="{{ $pasien->pekerjaan }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Status Pernikahan</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Status Pernikahan" value="{{ $pasien->status_kawin }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Golongan Darah</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Golongan Darah" value="{{ $pasien->gol_darah }}" readonly>
                    </div>
                    <div>
                        <label class="block text-gray-700">Email</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Email" value="{{ $pasien->email }}" readonly>
                    </div>
                </div>
            </div>

            <div id="riwayatKesehatanContent" class="hidden">
                <h2 class="text-lg font-semibold mb-2 mt-8">Data Riwayat Kesehatan</h2>
                {{-- <div class="mb-4">
                    <label for="recordDate" class="block mb-2 text-sm font-medium text-gray-700">Pilih Tanggal Pemeriksaan:</label>
                    <select id="recordDate" class="form-select mt-1 block w-full">
                        <option value="">Semua Tanggal</option>
                        @foreach ($healthRecords as $record)
                            <option value="{{ $record->record_date }}">{{ $record->record_date->format('d F Y') }}</option>
                        @endforeach
                    </select>
                </div> --}}
               
                <div class="overflow-x-auto">
                    <table id="healthRecordsTable" class="table-auto w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Tanggal Rekam Medis</th>
                                <th class="px-4 py-2 border">Berat Badan (kg)</th>
                                <th class="px-4 py-2 border">Tinggi Badan (cm)</th>
                                <th class="px-4 py-2 border">IMT</th>
                                <th class="px-4 py-2 border">Lingkar Perut (cm)</th>
                                <th class="px-4 py-2 border">Tekanan Darah (mmHg)</th>
                                <th class="px-4 py-2 border">Gula Darah Sewaktu (mg/dL)</th>
                                <th class="px-4 py-2 border">Kolesterol Total (mg/dL)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthRecords as $record)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $record->record_date->format('d F Y') }}</td>
                                    <td class="px-4 py-2 border">{{ $record->berat_badan }}</td>
                                    <td class="px-4 py-2 border">{{ $record->tinggi_badan }}</td>
                                    <td class="px-4 py-2 border">{{ $record->indeks_massa_tubuh }}</td>
                                    <td class="px-4 py-2 border">{{ $record->lingkar_perut }}</td>
                                    <td class="px-4 py-2 border">{{ $record->tekanan_darah }}</td>
                                    <td class="px-4 py-2 border">{{ $record->gula_darah_sewaktu }}</td>
                                    <td class="px-4 py-2 border">{{ $record->kolesterol_total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
           
            
        </div>
    </div>

    

    <script>
        // Fungsi untuk menampilkan dan menyembunyikan konten Data Diri dan Riwayat Kesehatan
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


        // Fungsi untuk menangani pencarian
        function filterByDate() {
            var selectedDate = document.getElementById('filterTanggal').value;
            if (selectedDate) {
                fetch(`/getHealthRecordsByDate/${selectedDate}`)
                    .then(response => response.json())
                    .then(data => {
                        // Mengupdate tabel dengan data yang diperoleh
                        var tableBody = document.getElementById('healthRecordsTable').getElementsByTagName('tbody')[0];
                        tableBody.innerHTML = '';
                        data.forEach(record => {
                            var row = tableBody.insertRow();
                            row.innerHTML = `
                                <tr>
                                    <td class="px-4 py-2 border">${record.record_date}</td>
                                    <td class="px-4 py-2 border">${record.berat_badan}</td>
                                    <td class="px-4 py-2 border">${record.tinggi_badan}</td>
                                    <td class="px-4 py-2 border">${record.indeks_massa_tubuh}</td>
                                    <td class="px-4 py-2 border">${record.lingkar_perut}</td>
                                    <td class="px-4 py-2 border">${record.tekanan_darah}</td>
                                    <td class="px-4 py-2 border">${record.gula_darah_sewaktu}</td>
                                    <td class="px-4 py-2 border">${record.kolesterol_total}</td>
                                    <td class="px-4 py-2 border">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="editHealthRecord(${record.id})">Edit</button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="deleteHealthRecord(${record.id})">Hapus</button>
                                    </td>
                                </tr>
                            `;
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                // Jika tidak ada tanggal yang dipilih, kembalikan tabel ke semua data
                fetch(`/getAllHealthRecords`)
                    .then(response => response.json())
                    .then(data => {
                        // Mengupdate tabel dengan data yang diperoleh
                        var tableBody = document.getElementById('healthRecordsTable').getElementsByTagName('tbody')[0];
                        tableBody.innerHTML = '';
                        data.forEach(record => {
                            var row = tableBody.insertRow();
                            row.innerHTML = `
                                <tr>
                                    <td class="px-4 py-2 border">${record.record_date}</td>
                                    <td class="px-4 py-2 border">${record.berat_badan}</td>
                                    <td class="px-4 py-2 border">${record.tinggi_badan}</td>
                                    <td class="px-4 py-2 border">${record.indeks_massa_tubuh}</td>
                                    <td class="px-4 py-2 border">${record.lingkar_perut}</td>
                                    <td class="px-4 py-2 border">${record.tekanan_darah}</td>
                                    <td class="px-4 py-2 border">${record.gula_darah_sewaktu}</td>
                                    <td class="px-4 py-2 border">${record.kolesterol_total}</td>
                                    <td class="px-4 py-2 border">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="editHealthRecord(${record.id})">Edit</button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" onclick="deleteHealthRecord(${record.id})">Hapus</button>
                                    </td>
                                </tr>
                            `;
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        // Fungsi untuk menghapus data kesehatan
        function deleteHealthRecord(recordId) {
            // Mengkonfirmasi penghapusan
            if (confirm('Apakah Anda yakin untuk menghapus data ini?')) {
                // Melakukan penghapusan data
                fetch(`/deleteHealthRecord/${recordId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Jika penghapusan berhasil, update tampilan tabel
                    if (data.success) {
                        filterByDate(); // Mengupdate tabel berdasarkan filter tanggal terakhir
                        alert('Data berhasil dihapus.');
                    } else {
                        alert('Gagal menghapus data.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }
    </script>

@endsection
