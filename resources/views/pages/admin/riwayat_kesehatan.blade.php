<!-- resources/views/pages/admin/riwayat_kesehatan.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 mt-5">
        <h2 class="text-2xl font-bold mb-6">Riwayat Kesehatan Pasien: {{ $patient->nama_lengkap }}</h2>

        <div class="grid grid-cols-2 gap-6">
            <div class="pasien">
                <div class="data bg-white shadow-md rounded-lg overflow-hidden p-4 mb-4">
                    <p><strong>NIK:</strong> {{ $patient->nik }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $patient->tanggal_lahir }}</p>
                    <p><strong>Umur:</strong> {{ $patient->umur }} tahun</p>
                    <!-- tambahkan informasi lainnya sesuai kebutuhan -->
                </div>

                <div>
                    @if ($healthRecords->isEmpty())
                        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
                            <p class="text-center text-gray-500">Tidak ada riwayat kesehatan untuk ditampilkan.</p>
                        </div>
                    @else
                        @foreach ($healthRecords as $record)
                            <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 mb-4">
                                <p><strong>Tanggal Rekam Medik:</strong> {{ $record->record_date }}</p>
                                <hr class="h-px bg-black border-0 ">
                                <p><strong>Riwayat Penyakit Keluarga:</strong> {{ $record->riwayat_ptm_keluarga  }}</p>
                                <p><strong>Riwayat Penyakit Sendiri:</strong> {{ $record->riwayat_ptm_sendiri  }}</p>
                                <p><strong>Merokok:</strong> {{ $record->merokok  }}</p>
                                <p><strong>Rutin Aktivitas Fisik:</strong> {{ $record->kurang_aktivitas_fisik  }}</p>
                                <p><strong>Rutin Konsumsi Sayur Buah:</strong> {{ $record->kurang_sayur_buah  }}</p>
                                <p><strong>Konsumsi Alkohol:</strong> {{ $record->konsumsi_alkohol  }}</p>
                                <p><strong>Berat Badan (kg):</strong> {{ $record->berat_badan }}</p>
                                <p><strong>Tinggi Badan (cm):</strong> {{ $record->tinggi_badan }}</p>
                                <p><strong>Indeks Massa Tubuh:</strong> {{ $record->indeks_massa_tubuh }}</p>
                                <p><strong>Lingkar Perut (cm):</strong> {{ $record->lingkar_perut }}</p>
                                <p><strong>Tekanan Darah:</strong> {{ $record->tekanan_darah }}</p>
                                <p><strong>Gula Darah Sewaktu:</strong> {{ $record->gula_darah_sewaktu }}</p>
                                <p><strong>Kolesterol Total:</strong> {{ $record->kolesterol_total }}</p>
                                <p><strong>Masalah Kesehatan:</strong> {{ $record->masalah_kesehatan }}</p>
                                <p><strong>Obat:</strong> {{ $record->obat_fasilitas }}</p>
                                <p><strong>Tindak Lanjut:</strong> {{ $record->tindak_lanjut }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Bagian untuk Grafik -->
            <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                <h3 class="text-xl font-bold mb-4">Grafik Kesehatan</h3>

                <!-- Chart untuk IMT -->
                <canvas id="chartIMT" width="400" height="200"></canvas>

                <!-- Chart untuk Lingkar Perut -->
                <canvas id="chartLingkarPerut" width="400" height="200"></canvas>

                <!-- Chart untuk Tekanan Darah -->
                <canvas id="chartTekananDarah" width="400" height="200"></canvas>

                <!-- Chart untuk Gula Darah Sewaktu -->
                <canvas id="chartGulaDarah" width="400" height="200"></canvas>

                <!-- Chart untuk Kolesterol -->
                <canvas id="chartKolesterol" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Chart (Contoh statis)
        const dataIMT = [ /* Data IMT */ ];
        const dataLingkarPerut = [ /* Data Lingkar Perut */ ];
        const dataTekananDarah = [ /* Data Tekanan Darah */ ];
        const dataGulaDarah = [ /* Data Gula Darah Sewaktu */ ];
        const dataKolesterol = [ /* Data Kolesterol */ ];

        // Fungsi untuk menggambar chart
        function drawCharts() {
            // Chart untuk IMT
            var ctxIMT = document.getElementById('chartIMT').getContext('2d');
            var chartIMT = new Chart(ctxIMT, {
                type: 'line',
                data: {
                    labels: ['Label Bulan'],
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

            // Chart untuk Lingkar Perut
            var ctxLingkarPerut = document.getElementById('chartLingkarPerut').getContext('2d');
            var chartLingkarPerut = new Chart(ctxLingkarPerut, {
                type: 'bar',
                data: {
                    labels: ['Label Bulan'],
                    datasets: [{
                        label: 'Lingkar Perut',
                        data: dataLingkarPerut,
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

            // Chart untuk Tekanan Darah
            var ctxTekananDarah = document.getElementById('chartTekananDarah').getContext('2d');
            var chartTekananDarah = new Chart(ctxTekananDarah, {
                type: 'bar',
                data: {
                    labels: ['Label Bulan'],
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

            // Chart untuk Gula Darah Sewaktu
            var ctxGulaDarah = document.getElementById('chartGulaDarah').getContext('2d');
            var chartGulaDarah = new Chart(ctxGulaDarah, {
                type: 'line',
                data: {
                    labels: ['Label Bulan'],
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

            // Chart untuk Kolesterol
            var ctxKolesterol = document.getElementById('chartKolesterol').getContext('2d');
            var chartKolesterol = new Chart(ctxKolesterol, {
                type: 'line',
                data: {
                    labels: ['Label Bulan'],
                    datasets: [{
                        label: 'Kolesterol',
                        data: dataKolesterol,
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
        }

        // Panggil fungsi untuk menggambar chart saat halaman dimuat
        drawCharts();
    </script>
@endsection
