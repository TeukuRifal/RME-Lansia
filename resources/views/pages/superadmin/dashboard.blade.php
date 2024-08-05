@extends('layouts.super')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .stat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-radius: 8px;
            background-color: #f8fafc;
        }
        .stat h3 {
            margin: 0;
            font-size: 1.25rem;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Super Admin Dashboard</h1>
            <p class=" text-lg font-medium">Selamat Datang  {{ auth()->user()->name }},  Gunakan sidebar untuk memanage aplikasi.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="card">
                <h2 class="text-xl font-bold mb-4">Ringkasan Statistik</h2>
                <div class="stat">
                    <h3>Total Pengguna</h3>
                    <span class="text-2xl font-bold">1,234</span>
                </div>
                <div class="stat">
                    <h3>Kegiatan Terbaru</h3>
                    <span class="text-2xl font-bold">56</span>
                </div>
                <div class="stat">
                    <h3>Pertumbuhan Pengguna</h3>
                    <span class="text-2xl font-bold">12%</span>
                </div>
            </div>
            <div class="card">
                <h2 class="text-xl font-bold mb-4">Laporan Kesehatan</h2>
                <canvas id="healthReportChart"></canvas>
            </div>
            <!-- Additional cards and sections as needed -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('healthReportChart').getContext('2d');
        const healthReportChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Laporan Kesehatan',
                    data: [65, 59, 80, 81, 56, 55],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
@endsection 