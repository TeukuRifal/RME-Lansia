@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 mt-5">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Riwayat Kesehatan Pasien: {{ $patient->nama_lengkap }}</h2>
            <div>
                <a href="{{ route('editRiwayat', $patient->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Data Pasien</a>
                <a href="{{ route('addPatientRecord', $patient->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Tambah Data Riwayat</a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="pasien">
                <div class="data bg-white shadow-md rounded-lg overflow-hidden p-4 mb-4">
                    <p><strong>NIK:</strong> {{ $patient->nik }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $patient->tanggal_lahir }}</p>
                    <p><strong>Umur:</strong> {{ $patient->umur }} tahun</p>
                    <!-- tambahkan informasi lainnya sesuai kebutuhan -->
                </div>

                <div class="riwayat bg-white shadow-md rounded-lg overflow-hidden p-4 mb-4">
                    <div class="dropdown mb-4">
                        <label for="tanggalRekamMedik">Pilih Tanggal Rekam Medik:</label>
                        <select id="tanggalRekamMedik" class="form-select block w-full mt-1" onchange="selectRecordDate(this.value)">
                            @foreach ($recordDates as $date)
                                <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM YYYY') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="h-px bg-black border-0 ">
                    <p><strong>Riwayat Penyakit Keluarga:</strong> <span id="riwayatPenyakitKeluarga">-</span></p>
                    <p><strong>Riwayat Penyakit Sendiri:</strong> <span id="riwayatPenyakitSendiri">-</span></p>
                    <p><strong>Merokok:</strong> <span id="merokok">-</span></p>
                    <p><strong>Rutin Aktivitas Fisik:</strong> <span id="aktivitasFisik">-</span></p>
                    <p><strong>Rutin Konsumsi Sayur Buah:</strong> <span id="konsumsiSayurBuah">-</span></p>
                    <p><strong>Konsumsi Alkohol:</strong> <span id="konsumsiAlkohol">-</span></p>
                    <p><strong>Berat Badan (kg):</strong> <span id="beratBadan">-</span></p>
                    <p><strong>Tinggi Badan (cm):</strong> <span id="tinggiBadan">-</span></p>
                    <p><strong>Indeks Massa Tubuh:</strong> <span id="indeksMassaTubuh">-</span></p>
                    <p><strong>Lingkar Perut (cm):</strong> <span id="lingkarPerut">-</span></p>
                    <p><strong>Tekanan Darah:</strong> <span id="tekananDarah">-</span></p>
                    <p><strong>Gula Darah Sewaktu:</strong> <span id="gulaDarahSewaktu">-</span></p>
                    <p><strong>Kolesterol Total:</strong> <span id="kolesterolTotal">-</span></p>
                    <p><strong>Masalah Kesehatan:</strong> <span id="masalahKesehatan">-</span></p>
                    <p><strong>Obat yang Diberikan oleh Fasilitas:</strong> <span id="obatFasilitas">-</span></p>
                    <p><strong>Tindak Lanjut:</strong> <span id="tindakLanjut">-</span></p>
                </div>
            </div>

            <!-- Bagian untuk Grafik -->
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h3 class="text-xl font-bold mb-4">Grafik Kesehatan</h3>

                <div id="loading" class="hidden text-center text-gray-500 mb-4">Memuat data...</div>

                <!-- Chart untuk IMT -->
                <canvas id="chartIMT" width="400" height="200" class="mb-4"></canvas>

                <!-- Chart untuk Lingkar Perut -->
                <canvas id="chartLingkarPerut" width="400" height="200" class="mb-4"></canvas>

                <!-- Chart untuk Tekanan Darah -->
                <canvas id="chartTekananDarah" width="400" height="200" class="mb-4"></canvas>

                <!-- Chart untuk Gula Darah Sewaktu -->
                <canvas id="chartGulaDarah" width="400" height="200" class="mb-4"></canvas>

                <!-- Chart untuk Kolesterol -->
                <canvas id="chartKolesterol" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengatur nilai default untuk dropdown
            selectRecordDate($('#tanggalRekamMedik').val());
            loadCharts();
        });

        // Fungsi untuk memuat grafik
        function loadCharts() {
            const records = @json($healthRecords);

            if (records.length === 0) {
                // Menampilkan pesan jika tidak ada data riwayat kesehatan
                $('#loading').addClass('hidden');
                return;
            }

            const dataIMT = records.map(record => record.indeks_massa_tubuh);
            const dataLingkarPerut = records.map(record => record.lingkar_perut);
            const dataTekananDarah = records.map(record => record.tekanan_darah);
            const dataGulaDarah = records.map(record => record.gula_darah_sewaktu);
            const dataKolesterol = records.map(record => record.kolesterol_total);
            const labels = records.map(record => record.record_date);

            // Inisialisasi chart untuk IMT
            const chartIMT = new Chart(document.getElementById('chartIMT').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'IMT',
                        data: dataIMT,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Inisialisasi chart untuk Lingkar Perut
            const chartLingkarPerut = new Chart(document.getElementById('chartLingkarPerut').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Lingkar Perut',
                        data: dataLingkarPerut,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Inisialisasi chart untuk Tekanan Darah
            const chartTekananDarah = new Chart(document.getElementById('chartTekananDarah').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Tekanan Darah',
                        data: dataTekananDarah,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Inisialisasi chart untuk Gula Darah Sewaktu
            const chartGulaDarah = new Chart(document.getElementById('chartGulaDarah').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Gula Darah Sewaktu',
                        data: dataGulaDarah,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Inisialisasi chart untuk Kolesterol
            const chartKolesterol = new Chart(document.getElementById('chartKolesterol').getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Kolesterol Total',
                        data: dataKolesterol,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Menghilangkan pesan loading setelah grafik dimuat
            $('#loading').addClass('hidden');
        }
         // Mendapatkan data riwayat kesehatan sesuai tanggal yang dipilih
         const filteredRecords = @json($healthRecords->where('record_date', $date)->first());

        // Fungsi untuk memuat data riwayat kesehatan berdasarkan tanggal yang dipilih
        function selectRecordDate(date) {
            const records = @json($healthRecords);

            const selectedRecord = records.find(record => record.record_date === date);
            if (selectedRecord) {
                $('#riwayatPenyakitKeluarga').text(selectedRecord.riwayat_penyakit_keluarga || '-');
                $('#riwayatPenyakitSendiri').text(selectedRecord.riwayat_penyakit_sendiri || '-');
                $('#merokok').text(selectedRecord.merokok || '-');
                $('#aktivitasFisik').text(selectedRecord.rutin_aktivitas_fisik || '-');
                $('#konsumsiSayurBuah').text(selectedRecord.rutin_konsumsi_sayur_buah || '-');
                $('#konsumsiAlkohol').text(selectedRecord.konsumsi_alkohol || '-');
                $('#beratBadan').text(selectedRecord.berat_badan || '-');
                $('#tinggiBadan').text(selectedRecord.tinggi_badan || '-');
                $('#indeksMassaTubuh').text(selectedRecord.indeks_massa_tubuh || '-');
                $('#lingkarPerut').text(selectedRecord.lingkar_perut || '-');
                $('#tekananDarah').text(selectedRecord.tekanan_darah || '-');
                $('#gulaDarahSewaktu').text(selectedRecord.gula_darah_sewaktu || '-');
                $('#kolesterolTotal').text(selectedRecord.kolesterol_total || '-');
                $('#masalahKesehatan').text(selectedRecord.masalah_kesehatan || '-');
                $('#obatFasilitas').text(selectedRecord.obat_fasilitas || '-');
                $('#tindakLanjut').text(selectedRecord.tindak_lanjut || '-');
            }
        }
    </script>
@endsection
