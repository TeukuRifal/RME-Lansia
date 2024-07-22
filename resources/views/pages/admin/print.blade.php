@extends('layouts.admin')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kesehatan Lansia</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .header-bg {
            background-color: #4A90E2;
            color: white;
        }

        .table-header {
            background-color: #f3f4f6;
        }

        .table-row:nth-child(even) {
            background-color: #f9fafb;
        }

        .card {
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
@section('content')
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-6">
        <!-- Header -->
        <header class="header-bg p-6 text-center">
            <h1 class="text-2xl font-bold">Laporan Kesehatan Lansia</h1>
            <p class="text-lg">Posbindu Lansia</p>
        </header>

        <!-- Patient Information -->
        <div class="card">
            <h2 class="text-xl font-semibold mb-4">Informasi Pasien</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="table-header">
                        <th class="py-2 px-4 text-left">Nama Lengkap</th>
                       
                        <th class="py-2 px-4 text-left">Jenis Kelamin</th>
                        <th class="py-2 px-4 text-left">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td class="py-2 px-4">{{ $record->patient->nama_lengkap }}</td>
                        
                        <td class="py-2 px-4">{{ $record->patient->jenis_kelamin }}</td>
                        <td class="py-2 px-4">{{ $record->patient->alamat }}</td>

                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Health Indicators -->
        <div class="card">
            <h2 class="text-xl font-semibold mb-4">Indikator Kesehatan</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="table-header">
                        <th class="py-2 px-4 text-left">Tanggal</th>
                        <th class="py-2 px-4 text-left">Berat Badan (kg)</th>
                        <th class="py-2 px-4 text-left">Tinggi Badan (cm)</th>
                        <th class="py-2 px-4 text-left">Tekanan Darah</th>
                        <th class="py-2 px-4 text-left">Gula Darah (mg/dL)</th>
                        <th class="py-2 px-4 text-left">Kolesterol Total (mg/dL)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-row">
                        <td class="py-2 px-4">{{ $record->record_date }}</td>
                        <td class="py-2 px-4">{{ $record->berat_badan }}</td>
                        <td class="py-2 px-4">{{ $record->tinggi_badan }}</td>
                        <td class="py-2 px-4">{{ $record->tekanan_darah_sistolik }}/{{ $record->tekanan_darah_diastolik }}</td>
                        <td class="py-2 px-4">{{ $record->gula_darah_sewaktu }}</td>
                        <td class="py-2 px-4">{{ $record->kolesterol_total }}</td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Health Trends -->
        <div class="card">
            <h2 class="text-xl font-semibold mb-4">Tren Kesehatan</h2>
            <!-- Example Chart -->
            <div class="relative">
                <canvas id="healthTrendChart" width="400" height="200"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx = document.getElementById('healthTrendChart').getContext('2d');
                    var healthTrendChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                            datasets: [{
                                label: 'Berat Badan (kg)',
                                data: [75, 76, 77, 74, 73, 75],
                                borderColor: '#4A90E2',
                                backgroundColor: 'rgba(74, 144, 226, 0.2)',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>

        <!-- Recommendations -->
        <div class="card">
            <h2 class="text-xl font-semibold mb-4">Rekomendasi Kesehatan</h2>
            <p>Berikut adalah beberapa rekomendasi berdasarkan data kesehatan terbaru:</p>
            <ul class="list-disc pl-6 mt-2">
                <li>Perbanyak konsumsi buah dan sayur.</li>
                <li>Lakukan aktivitas fisik secara teratur, seperti jalan kaki 30 menit sehari.</li>
                <li>Monitor tekanan darah secara rutin dan konsultasikan dengan dokter jika ada perubahan signifikan.
                </li>
            </ul>
        </div>
    </div>

</body>

@endsection
</html>
