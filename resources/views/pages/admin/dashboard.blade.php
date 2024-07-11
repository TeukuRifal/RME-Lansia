@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold">Total Pasien</h2>
                    <p class="text-2xl">{{ $totalPatients }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold">Jumlah Lansia</h2>
                    <p class="text-2xl">{{ $totalLansia }}</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold">Total Admin</h2>
                    <p class="text-2xl">{{ $totalAdmins }}</p>
                </div>
                <div class="bg-red-100 p-4 rounded-lg shadow-md">
                    <h2 class="text-lg font-bold">Total Super Admin</h2>
                    <p class="text-2xl">{{ $totalSuperAdmins }}</p>
                </div>
            </div>

            <!-- Grafik dan Diagram -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-bold mb-2">Distribusi Jenis Kelamin</h2>
                    <canvas id="genderChart" width="400" height="300"></canvas>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-bold mb-2">Distribusi Usia</h2>
                    <canvas id="ageChart" width="400" height="300"></canvas>
                </div>
            </div>

            <!-- Navigasi Cepat -->
            <div class="flex justify-end mt-4">
                <a href="{{ route('tambahPasien') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mr-2">Tambah
                    Pasien Baru</a>
                <a href="{{ route('daftarPasien') }}"
                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Kelola
                    Data Pasien</a>
            </div>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk chart jenis kelamin
            var genderLabels = {!! json_encode($genderLabels) !!};
            var genderCounts = {!! json_encode($genderCounts) !!};

            var ctxGender = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(ctxGender, {
                type: 'pie',
                data: {
                    labels: genderLabels,
                    datasets: [{
                        data: genderCounts,
                        backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                        borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });

            // Data untuk chart umur
            var ageLabels = {!! json_encode($ageLabels) !!};
            var ageCounts = {!! json_encode($ageCounts) !!};

            var ctxAge = document.getElementById('ageChart').getContext('2d');
            var ageChart = new Chart(ctxAge, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: ageCounts,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : null;
                                }
                            },
                            title: {
                                display: true,
                                text: 'Jumlah Pasien'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Usia (Tahun)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

        });
    </script>

@endsection
