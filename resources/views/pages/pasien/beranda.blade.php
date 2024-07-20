@extends('layouts.main')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        </style>
    </head>

    <body class="font-sans">
        <div class="h-screen flex bg-gradient-to-b from-lightblue to-[#edf5f8]">
            <div class="w-1/2 flex justify-center items-center p-8 md:p-20 mx-10">
                <div class="mx-auto slide-in-up">
                    <h1 class="text-4xl font-bold mb-4">Halo, {{ $pasien->nama_lengkap }}</h1>
                    <p class="text-3xl mb-8 text-justify leading-10">Jangan lupa untuk terus olahraga dan cek kesehatan ya!!
                        Mau lihat perkembangan lebih lanjut?</p>
                    <a href="#perkembangan" class="btn-3d text-black font-semibold py-2 px-4 rounded-full">Lihat
                        Perkembangan</a>
                </div>
            </div>
            <div class="flex-auto hidden md:flex justify-center items-center">
                <img src="{{ asset('images/Logo_Remela_Lansia.png') }}" alt="Welcome Image" class="w-auto h-80 slide-in float">
            </div>
        </div>

        <div id="perkembangan" class="mx-auto p-5  bg-white h-screen">
            <h2 class="mt-5 text-3xl font-bold text-center mb-14">Grafik Perkembangan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 justify-items-center mx-auto">
                @foreach (['Lingkar Perut', 'Gula Darah', 'IMT', 'Kolesterol'] as $grafik)
                    <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between">
                            <div>
                                <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                    {{ $grafik }}</h5>
                            </div>
                            <div
                                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                                Normal
                                <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <canvas id="chart-{{ strtolower(str_replace(' ', '-', $grafik)) }}"></canvas>
                        </div>
                    </div>
                @endforeach

                <!-- Chart untuk Tekanan Darah -->
                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                Tekanan Darah</h5>
                        </div>
                        <div
                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Normal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13V1m0 0L1 5m4-4 4 4" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <canvas id="chart-tekanan-darah"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 bg-white p-5">
            <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>
            <div class="p-6 rounded-xl shadow-lg bg-lightblue">
                @foreach ($jadwal as $schedule)
                    <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center border border-gray-200 hover:shadow-md transition-shadow duration-300">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $schedule->nama_tempat }}</h3>
                            <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->tanggal)->format('d F Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }} WIB</p>
                            <p class="text-sm text-gray-600">{{ $schedule->lokasi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const recordDates = @json($recordDates);
                const dataPerGrafik = @json($dataPerGrafik);

                Object.keys(dataPerGrafik).forEach(key => {
                    if (key !== 'Tekanan Darah Sistolik' && key !== 'Tekanan Darah Diastolik') {
                        new Chart(document.getElementById('chart-' + key.toLowerCase().replace(' ', '-')), {
                            type: 'line',
                            data: {
                                labels: recordDates,
                                datasets: [{
                                    label: key,
                                    data: dataPerGrafik[key],
                                    fill: 'start',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                    tension: 0.4
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: {
                                            display: true,
                                            color: 'rgba(200, 200, 200, 0.3)'
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false
                                        }
                                    }
                                }
                            }
                        });
                    }
                });

                // Untuk chart tekanan darah (sistolik dan diastolik)
                new Chart(document.getElementById('chart-tekanan-darah'), {
                    type: 'line',
                    data: {
                        labels: recordDates,
                        datasets: [{
                                label: 'Tekanan Darah Sistolik',
                                data: dataPerGrafik['Tekanan Darah Sistolik'],
                                fill: false,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                                tension: 0.4
                            },
                            {
                                label: 'Tekanan Darah Diastolik',
                                data: dataPerGrafik['Tekanan Darah Diastolik'],
                                fill: false,
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: true,
                                    color: 'rgba(200, 200, 200, 0.3)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            });
        </script>
    </body>

    </html>
@endsection
