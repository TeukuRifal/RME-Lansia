@extends('layouts.pasien')

@section('content')
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSWINDU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(50%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .slide-in-up {
            animation: slideInUp 1s ease-in-out;
        }

        .btn-3d {
            background: linear-gradient(145deg, #6ed3fc, #5ab0d3);
            box-shadow: 5px 5px 10px #4aa3c3, -5px -5px 10px #7eddfd;
            transition: all 0.3s ease-in-out;
        }

        .btn-3d:hover {
            box-shadow: 10px 10px 20px #4aa3c3, -10px -10px 20px #7eddfd;
            transform: translateY(-5px);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .chart-container.clicked {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1100;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
            display: none;
            width: 80vw;
            height: 80vh;
            max-width: 800px;
            max-height: 600px;
            overflow: auto;
        }

        .overlay.active {
            display: flex;
        }

        .chart-container.clicked {
            display: block;
        }

        canvas {
            display: block;
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body class="font-sans">

    <div class="container mx-auto p-6 bg-blue-200 rounded-lg shadow-md mt-10">
        <h1 class="text-4xl font-bold text-center mb-8">Profile</h1>
        <p class="text-center text-xl mb-6">Data Diri - Riwayat Kesehatan</p>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <div class="flex items-center">
                <div class="bg-gray-300 rounded-full w-24 h-24 flex items-center justify-center">
                    <img src="https://via.placeholder.com/100" alt="User Image" class="rounded-full">
                </div>
                <div class="ml-6">
                    <h2 class="text-2xl font-semibold">Username Pengguna</h2>
                    <p class="text-gray-500">Terdaftar dari 2020</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="border-b border-gray-200 mb-6">
                <ul class="flex justify-around">
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-blue-600 font-semibold border-b-2 border-blue-600" id="dataDiriTab" onclick="showDataDiri()">Data Diri</a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block py-2 px-4 text-gray-600 font-semibold" id="riwayatKesehatanTab" onclick="showRiwayatKesehatan()">Riwayat Kesehatan</a>
                    </li>
                </ul>
            </div>

            <div id="dataDiriSection">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama">
                    </div>
                    <div>
                        <label class="block text-gray-700">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="NIK">
                    </div>
                    <div>
                        <label class="block text-gray-700">Jenis Kelamin</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Jenis Kelamin">
                    </div>
                    <div>
                        <label class="block text-gray-700">Kunjungan</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Kunjungan">
                    </div>
                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama">
                    </div>
                    <div>
                        <label class="block text-gray-700">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="NIK">
                    </div>
                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama">
                    </div>
                    <div>
                        <label class="block text-gray-700">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="NIK">
                    </div>
                    <div>
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Nama">
                    </div>
                    <div>
                        <label class="block text-gray-700">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="NIK">
                    </div>
                </div>
            </div>

            <div id="riwayatKesehatanSection" class="hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="2024">
                    </div>
                    <div>
                        <select class="w-full px-4 py-2 border rounded-lg">
                            <option>Bulan</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <table class="min-w-full bg-white">
                            <thead class="bg-blue-200">
                                <tr>
                                    <th class="w-1/3 px-4 py-2">No</th>
                                    <th class="w-1/3 px-4 py-2">Data</th>
                                    <th class="w-1/3 px-4 py-2">Angka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2">1</td>
                                    <td class="border px-4 py-2">BMI</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">2</td>
                                    <td class="border px-4 py-2">Gula Darah</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">3</td>
                                    <td class="border px-4 py-2">Tekanan Darah</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">4</td>
                                    <td class="border px-4 py-2">Asam Urat</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-1/2">
                        <table class="min-w-full bg-white">
                            <thead class="bg-blue-200">
                                <tr>
                                    <th class="w-1/3 px-4 py-2">No</th>
                                    <th class="w-1/3 px-4 py-2">Data</th>
                                    <th class="w-1/3 px-4 py-2">Angka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border px-4 py-2">5</td>
                                    <td class="border px-4 py-2">BMI</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">6</td>
                                    <td class="border px-4 py-2">Gula Darah</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">7</td>
                                    <td class="border px-4 py-2">Tekanan Darah</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                                <tr>
                                    <td class="border px-4 py-2">8</td>
                                    <td class="border px-4 py-2">Asam Urat</td>
                                    <td class="border px-4 py-2">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="perkembangan" class="mx-auto p-5 rounded-xl bg-white">
            <h2 class="mt-5 text-3xl font-bold mb-8 text-center">Grafik Perkembangan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 justify-items-center mx-auto">
                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Lingkar Perut</h5>
                        </div>
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Baik
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-lingkar-perut"></canvas>
                    </div>
                </div>

                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Gula Darah</h5>
                        </div>
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Normal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-gula-darah"></canvas>
                    </div>
                </div>

                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Tekanan Darah</h5>
                        </div>
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Normal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-tekanan-darah"></canvas>
                    </div>
                </div>

                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">IMT</h5>
                        </div>
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Normal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-imt"></canvas>
                    </div>
                </div>

                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Asam Urat</h5>
                        </div>
                        <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Normal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-asam-urat"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Example data for charts (replace with your actual data)
        const lingkarPerutData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Lingkar Perut',
                data: [65, 59, 80, 81, 56],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        const gulaDarahData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Gula Darah',
                data: [120, 130, 125, 135, 130],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        const tekananDarahData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Tekanan Darah',
                data: [{
                    x: 10,
                    y: 20
                }, {
                    x: 15,
                    y: 10
                }, {
                    x: 25,
                    y: 15
                }],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const imtData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'IMT',
                data: [20, 21, 22, 23, 24],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        };

        const asamUratData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [{
                label: 'Asam Urat',
                data: [5, 6, 7, 6, 5],
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        };

        // Chart options (customize as needed)
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Initialize charts
        const lingkarPerutChart = new Chart(document.getElementById('chart-lingkar-perut'), {
            type: 'bar',
            data: lingkarPerutData,
            options: chartOptions
        });

        const gulaDarahChart = new Chart(document.getElementById('chart-gula-darah'), {
            type: 'line',
            data: gulaDarahData,
            options: chartOptions
        });

        const tekananDarahChart = new Chart(document.getElementById('chart-tekanan-darah'), {
            type: 'scatter',
            data: tekananDarahData,
            options: chartOptions
        });

        const imtChart = new Chart(document.getElementById('chart-imt'), {
            type: 'bar',
            data: imtData,
            options: chartOptions
        });

        const asamUratChart = new Chart(document.getElementById('chart-asam-urat'), {
            type: 'line',
            data: asamUratData,
            options: chartOptions
        });

        // Function to show/hide sections
        function showDataDiri() {
            document.getElementById('dataDiriSection').style.display = 'block';
            document.getElementById('riwayatKesehatanSection').style.display = 'none';
        }

        function showRiwayatKesehatan() {
            document.getElementById('dataDiriSection').style.display = 'none';
            document.getElementById('riwayatKesehatanSection').style.display = 'block';
        }
    </script>

</body>

</html>
@endsection
