@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .btn-3d {
            background: linear-gradient(145deg, #6ed3fc, #5ab0d3);
            box-shadow: 5px 5px 10px rgba(74, 163, 195, 0.3), -5px -5px 10px rgba(126, 223, 253, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-3d:hover {
            box-shadow: 10px 10px 20px rgba(74, 163, 195, 0.3), -10px -10px 20px rgba(126, 223, 253, 0.3);
            transform: translateY(-5px);
        }

        .table-container {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            overflow-x: auto;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        .table th {
            background-color: #f7fafc;
            color: #4a5568;
            font-weight: 600;
            text-transform: uppercase;
        }

        .table tbody tr:hover {
            background-color: #edf2f7;
        }
    </style>
</head>

<body class="font-sans">
    <div class="h-screen flex bg-gradient-to-b from-lightblue to-[#ffffff] pt-20 border-gray-200">
        <div class="w-full md:w-1/2 flex justify-center items-center md:p-20 mx-10">
            <div class="mx-auto slide-in-up">
                <h1 class="text-5xl font-bold mb-4 text-center md:text-left">Halo, {{ $pasien->nama_lengkap }}</h1>
                <p class="text-2xl mb-8 text-justify leading-8">Jangan lupa untuk terus olahraga dan cek kesehatan ya! Mau lihat perkembangan lebih lanjut?</p>
                <a href="#perkembangan" class="btn-3d text-black font-semibold text-2xl py-2 px-6 rounded-full">Lihat Perkembangan</a>
            </div>
        </div>
        <div class="flex-auto hidden md:flex justify-center items-center">
            <img src="{{ asset('images/LansiaLogoFix.png') }}" alt="Welcome Image" class="w-full md:w-auto h-auto">
        </div>
    </div>

    <div id="perkembangan" class="p-10 px-16 bg-white shadow-md rounded-lg justify-center items-center">
        <h2 class="text-4xl font-bold text-center mb-10">Grafik Perkembangan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (['Lingkar Perut', 'Gula Darah', 'Kolesterol'] as $grafik)
                <div class="chart-container bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-2xl font-semibold">{{ $grafik }}</h5>
                    </div>
                    <div>
                        <canvas id="chart-{{ strtolower(str_replace(' ', '-', $grafik)) }}"></canvas>
                    </div>
                </div>
            @endforeach

            <div class="chart-container bg-white rounded-lg shadow-lg p-6 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-2xl font-semibold">Tekanan Darah</h5>
                </div>
                <div>
                    <canvas id="chart-tekanan-darah"></canvas>
                </div>
            </div>

            <div class="chart-container bg-white rounded-lg shadow-lg p-6 mb-4">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-2xl font-semibold">IMT (Indeks Massa Tubuh)</h5>
                </div>
                <div>
                    <canvas id="chart-imt"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-4 border my-4 bg-white shadow-md rounded-lg">
        <h1 class="text-4xl font-bold mb-6 text-center">Informasi Status Kesehatan Bulan Ini</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center {{ $statusKolesterol == 'Normal' ? 'bg-green-200' : ($statusKolesterol == 'Tinggi' ? 'bg-red-200' : 'bg-blue-200') }}">
                <h2 class="text-lg font-bold mb-2">Kolesterol</h2>
                <p class="text-xl">{{ $statusKolesterol }}</p>
            </div>

            <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center {{ $statusIMT == 'Berat badan normal' ? 'bg-green-200' : ($statusIMT == 'Kelebihan berat badan/obesitas' ? 'bg-red-200' : 'bg-yellow-200') }}">
                <h2 class="text-lg font-bold mb-2">Indeks Massa Tubuh (IMT)</h2>
                <p class="text-xl">{{ $statusIMT }}</p>
            </div>

            <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center {{ $statusLingkarPerut == 'Normal' ? 'bg-green-100' : ($statusLingkarPerut == 'Tinggi' ? 'bg-red-100' : 'bg-white') }}">
                <h2 class="text-lg font-bold mb-2">Lingkar Perut</h2>
                <p class="text-xl">{{ $statusLingkarPerut }}</p>
            </div>

            <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center {{ $statusTekananDarah == 'Normal' ? 'bg-green-200' : ($statusTekananDarah == 'Pra-hipertensi' ? 'bg-yellow-200' : ($statusTekananDarah == 'Hipertensi tingkat 1' ? 'bg-orange-200' : ($statusTekananDarah == 'Hipertensi tingkat 2' ? 'bg-red-200' : ($statusTekananDarah == 'Hipertensi Sistolik Terisolasi' ? 'bg-blue-200' : 'bg-gray-200')))) }}">
                <h2 class="text-lg font-bold mb-2">Tekanan Darah</h2>
                <p class="text-xl">{{ $statusTekananDarah }}</p>
            </div>
        </div>

        <!-- Jadwal Pemeriksaan Selanjutnya -->
        <div class="p-6 mt-10 bg-white shadow-md rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
            @if ($schedules->isNotEmpty())
                <div class="table-container ">
                    <table class="table ">
                        <thead class="bg-blue-600 text-gray-800">
                            <tr>
                                <th class="p-4">Deskripsi</th>
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Waktu</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr class="hover:bg-gray-100">
                                    <td>{{ $schedule->description }}</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->time)->format('H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">Tidak ada jadwal pemeriksaan selanjutnya.</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx1 = document.getElementById('chart-lingkar-perut').getContext('2d');
            var ctx2 = document.getElementById('chart-gula-darah').getContext('2d');
            var ctx3 = document.getElementById('chart-kolesterol').getContext('2d');
            var ctx4 = document.getElementById('chart-tekanan-darah').getContext('2d');
            var ctx5 = document.getElementById('chart-imt').getContext('2d');

            var chart1 = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Lingkar Perut',
                        data: [10, 20, 15, 25, 30, 35],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            var chart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Gula Darah',
                        data: [80, 85, 82, 87, 90, 95],
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            var chart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Kolesterol',
                        data: [180, 190, 185, 200, 210, 220],
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            var chart4 = new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Tekanan Darah',
                        data: [120, 125, 130, 135, 140, 145],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });

            var chart5 = new Chart(ctx5, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'IMT',
                        data: [22, 23, 22.5, 23.5, 24, 24.5],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: { beginAtZero: true },
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</body>
</html>
@endsection
