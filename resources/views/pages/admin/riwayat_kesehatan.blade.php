@extends('layouts.admin')

@section('title', 'Riwayat Kesehatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <nav class="text-md mb-4">
            <a href="{{ route('daftarPasien') }}" class="text-blue-500">Klien</a> &gt;
            <span class="text-gray-500">Detail Riwayat Klien</span>
        </nav>
        <a href="{{ route('daftarPasien') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-300 mb-4">Kembali</a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="info bg-white rounded-lg p-4 border mb-4">
            <p class="font-semibold text-xl mb-2">Info Klien</p>
            <hr class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-2">
                    <label for="namaLengkap" class="block text-sm font-bold text-gray-700">Nama Lengkap:</label>
                    <span id="namaLengkap" class="text-gray-900"> {{ $patient->nama_lengkap }}</span>
                </div>
                <div class="p-2">
                    <label for="nik" class="block text-sm font-bold text-gray-700">NIK:</label>
                    <span id="nik" class="text-gray-900"> {{ $patient->nik }}</span>
                </div>
                <div class="p-2">
                    <label for="gender" class="block text-sm font-bold text-gray-700">Jenis Kelamin:</label>
                    <span id="gender" class="text-gray-900"> {{ $patient->jenis_kelamin }}</span>
                </div>
                <div class="p-2">
                    <label for="tanggalLahir" class="block text-sm font-bold text-gray-700">Tanggal Lahir:</label>
                    <span id="tanggalLahir" class="text-gray-900"> {{ $patient->tanggal_lahir }}</span>
                </div>
            </div>
        </div>

        <h3 class="text-xl font-bold mb-4">Grafik Kesehatan</h3>
        <div id="loading" class="hidden text-center text-gray-500 mb-4">Memuat data...</div>

        <!-- Grid untuk grafik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Chart untuk Lingkar Perut -->
            <div class="col-span-1">
                <canvas id="chartLingkarPerut" width="400" height="200" class="mb-4"></canvas>
            </div>

            <!-- Chart untuk Tekanan Darah -->
            <div class="col-span-1">
                <canvas id="chartTekananDarah" width="400" height="200" class="mb-4"></canvas>
            </div>

            <!-- Chart untuk Gula Darah Sewaktu -->
            <div class="col-span-1">
                <canvas id="chartGulaDarah" width="400" height="200" class="mb-4"></canvas>
            </div>

            <!-- Chart untuk Kolesterol -->
            <div class="col-span-1">
                <canvas id="chartKolesterol" width="400" height="200" class="mb-4"></canvas>
            </div>

            <!-- Chart untuk IMT -->
            <div class="col-span-1">
                <canvas id="chartIMT" width="400" height="200" class="mb-4"></canvas>
            </div>  
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <div class="riwayat">
            <p class="font-bold text-2xl mb-4">Riwayat Kesehatan</p>
            <hr class="h-px bg-gray-300 border-0 mb-4">

            <div class="dropdown mb-6">
                <label for="tanggalRekamMedik" class="block text-sm font-bold text-gray-700">Pilih Tanggal Rekam Medik:</label>
                <select id="tanggalRekamMedik"
                    class="form-select block w-full md:w-1/3 mt-2 p-2 border rounded-lg hover:bg-blue-50"
                    onchange="selectRecordDate(this.value)">
                    @foreach ($recordDates as $index => $date)
                        <option class="p-2" value="{{ $index }}">{{ $date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="riwayatPenyakitKeluarga" class="block text-sm font-bold text-gray-700">Riwayat Penyakit Keluarga:</label>
                    <span id="riwayatPenyakitKeluarga" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="riwayatPenyakitSendiri" class="block text-sm font-bold text-gray-700">Riwayat Penyakit Sendiri:</label>
                    <span id="riwayatPenyakitSendiri" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="merokok" class="block text-sm font-bold text-gray-700">Merokok:</label>
                    <span id="merokok" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="aktivitasFisik" class="block text-sm font-bold text-gray-700">Rutin Aktivitas Fisik:</label>
                    <span id="aktivitasFisik" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="konsumsiSayurBuah" class="block text-sm font-bold text-gray-700">Rutin Konsumsi Sayur Buah:</label>
                    <span id="konsumsiSayurBuah" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="konsumsiAlkohol" class="block text-sm font-bold text-gray-700">Konsumsi Alkohol:</label>
                    <span id="konsumsiAlkohol" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="beratBadan" class="block text-sm font-bold text-gray-700">Berat Badan (kg):</label>
                    <span id="beratBadan" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="tinggiBadan" class="block text-sm font-bold text-gray-700">Tinggi Badan (cm):</label>
                    <span id="tinggiBadan" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="lingkarPerut" class="block text-sm font-bold text-gray-700">Lingkar Perut (cm):</label>
                    <span id="lingkarPerut" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="asamUrat" class="block text-sm font-bold text-gray-700">Asam Urat (mg):</label>
                    <span id="asamUrat" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="tekananDarah" class="block text-sm font-bold text-gray-700">Tekanan Darah:</label>
                    <span id="tekananDarah" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="gulaDarahSewaktu" class="block text-sm font-bold text-gray-700">Gula Darah Sewaktu:</label>
                    <span id="gulaDarahSewaktu" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="gulaDarahPuasa" class="block text-sm font-bold text-gray-700">Gula Darah Puasa:</label>
                    <span id="gulaDarahPuasa" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="kolesterolTotal" class="block text-sm font-bold text-gray-700">Kolesterol Total:</label>
                    <span id="kolesterolTotal" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="masalahKesehatan" class="block text-sm font-bold text-gray-700">Masalah Kesehatan:</label>
                    <span id="masalahKesehatan" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="obatFasilitas" class="block text-sm font-bold text-gray-700">Obat Fasilitas:</label>
                    <span id="obatFasilitas" class="text-gray-900">-</span>
                </div>
                <div>
                    <label for="tindakLanjut" class="block text-sm font-bold text-gray-700">Tindak Lanjut:</label>
                    <span id="tindakLanjut" class="text-gray-900">-</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Load chart data
        loadChartData();
    });

    function loadChartData() {
        // Placeholder for chart data loading
    }

    function selectRecordDate(dateValue) {
        // Placeholder for updating health history data based on selected date
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengatur nilai default untuk dropdown
            selectRecordDate($('#tanggalRekamMedik').val());
            loadCharts();
        });

        // Fungsi untuk memuat data riwayat kesehatan berdasarkan tanggal yang dipilih
        function selectRecordDate(index) {
            const records = @json($healthRecords);
            const selectedRecord = records[index];

            if (selectedRecord) {
                $('#riwayatPenyakitKeluarga').text(selectedRecord.riwayat_penyakit_keluarga || '-');
                $('#riwayatPenyakitSendiri').text(selectedRecord.riwayat_penyakit_sendiri || '-');
                $('#merokok').text(selectedRecord.merokok || '-');
                $('#aktivitasFisik').text(selectedRecord.rutin_aktivitas_fisik || '-');
                $('#konsumsiSayurBuah').text(selectedRecord.rutin_konsumsi_sayur_buah || '-');
                $('#konsumsiAlkohol').text(selectedRecord.konsumsi_alkohol || '-');
                $('#beratBadan').text(selectedRecord.berat_badan || '-');
                $('#tinggiBadan').text(selectedRecord.tinggi_badan || '-');
                $('#lingkarPerut').text(selectedRecord.lingkar_perut || '-');
                $('#asamUrat').text(selectedRecord.asam_urat || '-');
                $('#tekananDarah').text(selectedRecord.tekanan_darah || '-');
                $('#gulaDarahSewaktu').text(selectedRecord.gula_darah_sewaktu || '-');
                $('#gulaDarahSewaktu').text(selectedRecord.gula_darah_puasa || '-');
                $('#kolesterolTotal').text(selectedRecord.kolesterol_total || '-');
                $('#masalahKesehatan').text(selectedRecord.masalah_kesehatan || '-');
                $('#obatFasilitas').text(selectedRecord.obat || '-');
                $('#tindakLanjut').text(selectedRecord.tindak_lanjut || '-');
            } else {
                resetData();
            }

            loadCharts();
        }

        // Fungsi untuk me-reset nilai default jika tidak ada data yang dipilih
        function resetData() {
            $('#riwayatPenyakitKeluarga').text('-');
            $('#riwayatPenyakitSendiri').text('-');
            $('#merokok').text('-');
            $('#aktivitasFisik').text('-');
            $('#konsumsiSayurBuah').text('-');
            $('#konsumsiAlkohol').text('-');
            $('#beratBadan').text('-');
            $('#tinggiBadan').text('-');
            $('#indeksMassaTubuh').text('-');
            $('#lingkarPerut').text('-');
            $('#asamUrat').text('-');
            $('#tekananDarah').text('-');
            $('#gulaDarahSewaktu').text('-');
            $('#gulaDarahPuasa').text('-');
            $('#kolesterolTotal').text('-');
            $('#masalahKesehatan').text('-');
            $('#obatFasilitas').text('-');
            $('#tindakLanjut').text('-');
        }

        // Fungsi untuk memuat grafik dengan data yang sesuai
        function loadCharts() {
            const records = @json($healthRecords);

            // Grafik untuk 
            const imtLabels = records.map(record => formatDate(record.record_date));




            // Grafik untuk Lingkar Perut
            const lingkarPerutData = records.map(record => record.lingkar_perut);

            const lingkarPerutChart = document.getElementById('chartLingkarPerut').getContext('2d');
            new Chart(lingkarPerutChart, {
                type: 'line',
                data: {
                    labels: imtLabels,
                    datasets: [{
                        label: 'Lingkar Perut',
                        data: lingkarPerutData,
                        fill: false,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0, // Nilai minimum untuk sumbu Y
                            max: 200, // Nilai maksimum untuk sumbu Y
                            ticks: {
                                stepSize: 20 // Langkah-nilai untuk sumbu Y
                            }
                        }
                    }
                }
            });

            // Grafik untuk Tekanan Darah (Sistolik dan Diastolik)
            const tekananDarahSistolikData = records.map(record => record.tekanan_darah_sistolik);
            const tekananDarahDiastolikData = records.map(record => record.tekanan_darah_diastolik);

            const tekananDarahChart = document.getElementById('chartTekananDarah').getContext('2d');
            new Chart(tekananDarahChart, {
                type: 'line',
                data: {
                    labels: imtLabels,
                    datasets: [{
                            label: 'Tekanan Darah Sistolik',
                            data: tekananDarahSistolikData,
                            fill: false,
                            borderColor: 'rgb(54, 162, 235)',
                            tension: 0.1
                        },
                        {
                            label: 'Tekanan Darah Diastolik',
                            data: tekananDarahDiastolikData,
                            fill: false,
                            borderColor: 'rgb(255, 99, 132)',
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            min: 0, // Nilai minimum untuk sumbu Y
                            max: 200, // Nilai maksimum untuk sumbu Y
                            ticks: {
                                stepSize: 20 // Langkah-nilai untuk sumbu Y
                            }
                        }
                    }
                }
            });


            // Grafik untuk Gula Darah Sewaktu
            const gulaDarahData = records.map(record => record.gula_darah_sewaktu);

            const gulaDarahChart = document.getElementById('chartGulaDarah').getContext('2d');
            new Chart(gulaDarahChart, {
                type: 'line',
                data: {
                    labels: imtLabels,
                    datasets: [{
                        label: 'Gula Darah Sewaktu',
                        data: gulaDarahData,
                        fill: false,
                        borderColor: 'rgb(153, 102, 255)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0, // Nilai minimum untuk sumbu Y
                            max: 300, // Nilai maksimum untuk sumbu Y
                            ticks: {
                                stepSize: 30 // Langkah-nilai untuk sumbu Y
                            }
                        }
                    }
                }
            });

            // Grafik untuk Kolesterol
            const kolesterolData = records.map(record => record.kolesterol_total);

            const kolesterolChart = document.getElementById('chartKolesterol').getContext('2d');
            new Chart(kolesterolChart, {
                type: 'line',
                data: {
                    labels: imtLabels,
                    datasets: [{
                        label: 'Kolesterol Total',
                        data: kolesterolData,
                        fill: false,
                        borderColor: 'rgb(255, 159, 64)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0, // Nilai minimum untuk sumbu Y
                            max: 400, // Nilai maksimum untuk sumbu Y
                            ticks: {
                                stepSize: 50 // Langkah-nilai untuk sumbu Y
                            }
                        }
                    }
                }
            });
        }

        const ImtData = records.map(record => record.indeks_massa_tubuh);

        const ImtChart = document.getElementById('chartIMT').getContext('2d');
            new Chart(ImtChart, {
                type: 'line',
                data: {
                    labels: imtLabels,
                    datasets: [{
                        label: 'Indeks Massa Tubuh',
                        data: ImtData,
                        fill: false,
                        borderColor: 'rgb(255, 159, 64)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0, // Nilai minimum untuk sumbu Y
                            max: 400, // Nilai maksimum untuk sumbu Y
                            ticks: {
                                stepSize: 50 // Langkah-nilai untuk sumbu Y
                            }
                        }
                    }
                }
            });

        // Fungsi untuk mengubah format tanggal menjadi bulan dan tahun (misalnya "Juli 2024")
        function formatDate(dateString) {
            const options = {
                month: 'long',
                year: 'numeric'
            };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }
    </script>
@endsection
