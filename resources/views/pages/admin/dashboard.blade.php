@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <div>
            <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Dashboard cards -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Total Pasien</h2>
            <p class="mt-4 text-3xl">{{ $totalPatients }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Pasien Lansia (>60 Tahun)</h2>
            <p class="mt-4 text-3xl">{{ $totalLansia }}</p>
        </div>
        <!-- Chart -->
        <div class="bg-white p-6 rounded-lg shadow-md col-span-2 md:col-span-1">
            <canvas id="genderChart" width="800" height="400"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <canvas id="ageChart" width="800" height="400"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gender Chart
            var ctxGender = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(ctxGender, {
                type: 'bar',
                data: {
                    labels: @json($genderLabels ?? []),
                    datasets: [{
                        label: 'Distribusi Jenis Kelamin',
                        data: @json($genderCounts ?? []),
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
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

            // Age Chart (Pie Chart)

            // Inisialisasi pie chart
            var ctxAge = document.getElementById('ageChart').getContext('2d');
            var ageChart = new Chart(ctxAge, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($ageLabels) !!},
                    datasets: [{
                        label: 'Distribusi Umur',
                        data: {!! json_encode(array_values($ageCounts)) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                        ],
                        borderWidth: 1
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
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

        });
    </script>

@endsection
