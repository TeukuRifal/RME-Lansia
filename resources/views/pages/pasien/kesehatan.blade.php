@extends('layouts.main')

@section('title', 'Dashboard Kesehatan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard Kesehatan</h1>

        <!-- Informasi pasien -->
        <div class="mb-6">
            <p class="font-bold text-lg">Selamat Datang, {{ $patient->nama_lengkap }}</p>
            <p>Berikut adalah rekapan kesehatan Anda, selalu jaga kesehatan dan pola makan yang baik.</p>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
            <!-- IMT Chart -->
            <div class="bg-white rounded-lg shadow-md p-4 ">
                <h2 class="text-lg font-bold mb-2">Indeks Massa Tubuh (IMT)</h2>
                <canvas id="imtChart" width="400" height="300"></canvas>
            </div>

            <!-- Lingkar Perut Chart -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Lingkar Perut</h2>
                <canvas id="lingkarPerutChart" width="400" height="300"></canvas>
            </div>

            <!-- Tekanan Darah Chart -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Tekanan Darah</h2>
                <canvas id="tekananDarahChart" width="400" height="300"></canvas>
            </div>

            <!-- Gula Darah Sewaktu Chart -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Gula Darah Sewaktu</h2>
                <canvas id="gulaDarahChart" width="400" height="300"></canvas>
            </div>

            <!-- Kolesterol Chart -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Kolesterol Total</h2>
                <canvas id="kolesterolChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var months = {!! json_encode($imtDataPerMonth->pluck('month')) !!};
        var avgImt = {!! json_encode($imtDataPerMonth->pluck('avg_imt')) !!};

        var ctxImt = document.getElementById('imtChart').getContext('2d');
        var imtChart = new Chart(ctxImt, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Rata-rata IMT per Bulan',
                    data: avgImt,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'IMT: ' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'IMT'
                        }
                    }
                }
            }
        });

        // Lingkar Perut Chart
        var lingkarPerutChartCanvas = document.getElementById('lingkarPerutChart').getContext('2d');
        var lingkarPerutChart = new Chart(lingkarPerutChartCanvas, {
            type: 'bar',
            data: {
                labels: ['Lingkar Perut'],
                datasets: [{
                    label: 'Lingkar Perut',
                    data: [{{ $healthData['Lingkar Perut'] }}],
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

        // Tekanan Darah Chart
        var tekananDarahChartCanvas = document.getElementById('tekananDarahChart').getContext('2d');
        var tekananDarahChart = new Chart(tekananDarahChartCanvas, {
            type: 'line',
            data: {
                labels: ['Tekanan Darah'],
                datasets: [{
                    label: 'Tekanan Darah',
                    data: [{{ $healthData['Tekanan Darah'] }}],
                    fill: false,
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

        // Gula Darah Sewaktu Chart
        var gulaDarahChartCanvas = document.getElementById('gulaDarahChart').getContext('2d');
        var gulaDarahChart = new Chart(gulaDarahChartCanvas, {
            type: 'line',
            data: {
                labels: ['Gula Darah Sewaktu'],
                datasets: [{
                    label: 'Gula Darah Sewaktu',
                    data: [{{ $healthData['Gula Darah Sewaktu'] }}],
                    fill: false,
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

        // Kolesterol Chart
        var kolesterolChartCanvas = document.getElementById('kolesterolChart').getContext('2d');
        var kolesterolChart = new Chart(kolesterolChartCanvas, {
            type: 'bar',
            data: {
                labels: ['Kolesterol Total'],
                datasets: [{
                    label: 'Kolesterol Total',
                    data: [{{ $healthData['Kolesterol Total'] }}],
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
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
    });
</script>

@endsection
