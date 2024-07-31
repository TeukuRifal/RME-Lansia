@extends('layouts.main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4 border my-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Informasi Pasien</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Info Pasien -->
        <div>
            <h2 class="text-2xl font-semibold mb-2">Info Pasien</h2>
            <p><strong>Nama Lengkap:</strong> Beliana</p>
            <p><strong>Tanggal Lahir:</strong> 18 Feb 2016 (7 Tahun)</p>
            <p><strong>MRN:</strong> BRNF000150</p>
            <p><strong>Jenis Kelamin:</strong> Perempuan</p>
            <p><strong>Pembiayaan:</strong> Pribadi</p>
        </div>

        <!-- Data Kesehatan -->
        <div>
            <h2 class="text-2xl font-semibold mb-2">Data Kesehatan</h2>
            <p><strong>Golongan Darah:</strong> B</p>
            <p><strong>Status Perokok:</strong> Merokok (0 batang per hari)</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
        <!-- Anamnesa -->
        <div>
            <h2 class="text-2xl font-semibold mb-2">Anamnesa</h2>
            <p><strong>Keluhan:</strong> <!-- Isi keluhan di sini --></p>
            <p><strong>Riwayat Penyakit:</strong> <!-- Isi riwayat penyakit di sini --></p>
            <p><strong>Riwayat Alergi:</strong> <!-- Isi riwayat alergi di sini --></p>
        </div>

        <!-- Objective -->
        <div>
            <h2 class="text-2xl font-semibold mb-2">Objective</h2>
            <p><strong>Kesadaran:</strong> Compos Mentis</p>
        </div>
    </div>
</div>

<div id="perkembangan" class="container p-5 bg-white shadow-md rounded-lg mx-5 my-10">
    <h2 class="text-3xl font-bold text-center mb-10">Grafik Perkembangan</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Grafik -->
        <div class="chart-container bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-semibold">Lingkar Perut</h5>
            </div>
            <div>
                <canvas id="chart-lingkar-perut"></canvas>
            </div>
        </div>
        <div class="chart-container bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-semibold">Gula Darah</h5>
            </div>
            <div>
                <canvas id="chart-gula-darah"></canvas>
            </div>
        </div>
        <div class="chart-container bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-semibold">Kolesterol</h5>
            </div>
            <div>
                <canvas id="chart-kolesterol"></canvas>
            </div>
        </div>
        <div class="chart-container bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-semibold">Tekanan Darah</h5>
            </div>
            <div>
                <canvas id="chart-tekanan-darah"></canvas>
            </div>
        </div>
        <div class="chart-container bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-semibold">IMT (Indeks Massa Tubuh)</h5>
            </div>
            <div>
                <canvas id="chart-imt"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto p-4 border my-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6 text-center">Informasi Status Kesehatan Bulan Ini</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Status Kesehatan -->
        <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center bg-green-200">
            <h2 class="text-lg font-bold mb-2">Kolesterol</h2>
            <p class="text-xl">{{ $statusKolesterol }}</p>
        </div>
        <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center bg-green-200">
            <h2 class="text-lg font-bold mb-2">IMT</h2>
            <p class="text-xl">{{ $statusIMT }}</p>
        </div>
        <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center bg-green-100">
            <h2 class="text-lg font-bold mb-2">Lingkar Perut</h2>
            <p class="text-xl">{{ $statusLingkarPerut }}</p>
        </div>
        <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center bg-green-200">
            <h2 class="text-lg font-bold mb-2">Tekanan Darah</h2>
            <p class="text-xl">{{ $statusTekananDarah }}</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Placeholder script for chart initialization
    const ctxLingkarPerut = document.getElementById('chart-lingkar-perut').getContext('2d');
    const ctxGulaDarah = document.getElementById('chart-gula-darah').getContext('2d');
    const ctxKolesterol = document.getElementById('chart-kolesterol').getContext('2d');
    const ctxTekananDarah = document.getElementById('chart-tekanan-darah').getContext('2d');
    const ctxIMT = document.getElementById('chart-imt').getContext('2d');
    
    new Chart(ctxLingkarPerut, { type: 'line', data: {} });
    new Chart(ctxGulaDarah, { type: 'line', data: {} });
    new Chart(ctxKolesterol, { type: 'line', data: {} });
    new Chart(ctxTekananDarah, { type: 'line', data: {} });
    new Chart(ctxIMT, { type: 'line', data: {} });
</script>

</body>
</html>

@endsection

