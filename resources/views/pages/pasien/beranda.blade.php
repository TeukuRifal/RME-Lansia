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
        <div class=" h-screen flex bg-gradient-to-b from-lightblue to-[#edf5f8]">
            <div class="w-1/2 flex justify-center items-center p-8 md:p-20 mx-10">
                <div class="mx-auto slide-in-up">
                    <h1 class="text-4xl font-bold mb-4">Halo, {{ $pasien->nama_lengkap }} </h1>
                    <p class="text-3xl mb-8 text-justify leading-10">Jangan lupa untuk terus olahraga dan cek kesehatan ya!!
                        Mau lihat perkembangan lebih lanjut?</p>
                    <a href="#perkembangan" class="btn-3d text-black font-semibold py-2 px-4 rounded-full">Lihat Perkembangan</a>
                </div>
            </div>
            <div class="flex-auto hidden md:flex justify-center items-center">
                <img src="{{ asset('images/Lansia.png') }}" alt="Welcome Image" class="w-auto h-80 slide-in float">
            </div>
        </div>

        <div id="perkembangan" class="mx-auto p-5 rounded-xl bg-white">
            <h2 class="mt-5 text-3xl font-bold mb-8 text-center">Grafik Perkembangan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 justify-items-center mx-auto">
                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">
                                Lingkar Perut</h5>
                        </div>
                        <div
                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Baik
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13V1m0 0L1 5m4-4 4 4" />
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
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Gula
                                Darah</h5>
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
                        <canvas id="chart-gula-darah"></canvas>
                    </div>
                </div>
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
                <div class="chart-container w-full max-w-sm bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">IMT
                            </h5>
                        </div>
                        <div
                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            Ideal
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13V1m0 0L1 5m4-4 4 4" />
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
                            <h5 class="text-center leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">Asam
                                Urat</h5>
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
                        <canvas id="chart-asam-urat"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section Jadwal -->
        <div id="profil" class="mx-auto p-5 rounded-xl bg-white">
            <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>
            <div class="bg-lightblue p-6 mx-44 mt-16 rounded-xl shadow-lg">
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">08.00 - 12.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="overlay" class="overlay"></div>

        <script>
            const dataLingkarPerut = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Lingkar Perut',
                    data: [75, 70, 80, 85, 90, 85, 80],
                    fill: 'start',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            };

            const dataGulaDarah = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Gula Darah',
                    data: [65, 60, 70, 95, 80, 75, 85],
                    fill: 'start',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            };

            const dataTekananDarah = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Tekanan Darah',
                    data: [120, 125, 130, 135, 130, 125, 120],
                    fill: 'start',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            };

            const dataImt = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'IMT',
                    data: [22, 22.5, 23, 24, 23.5, 23, 22.5],
                    fill: 'start',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            };

            const dataAsamUrat = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'Asam Urat',
                    data: [5, 5.5, 6, 7, 6.5, 6, 5.5],
                    fill: 'start',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            };

            const configLingkarPerut = {
                type: 'line',
                data: dataLingkarPerut,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 100
                        }
                    }
                }
            };

            const configGulaDarah = {
                type: 'line',
                data: dataGulaDarah,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 100
                        }
                    }
                }
            };

            const configTekananDarah = {
                type: 'line',
                data: dataTekananDarah,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 150
                        }
                    }
                }
            };

            const configImt = {
                type: 'line',
                data: dataImt,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 30
                        }
                    }
                }
            };

            const configAsamUrat = {
                type: 'line',
                data: dataAsamUrat,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 10
                        }
                    }
                }
            };

            const ctxLingkarPerut = document.getElementById('chart-lingkar-perut').getContext('2d');
            const chartLingkarPerut = new Chart(ctxLingkarPerut, configLingkarPerut);

            const ctxGulaDarah = document.getElementById('chart-gula-darah').getContext('2d');
            const chartGulaDarah = new Chart(ctxGulaDarah, configGulaDarah);

            const ctxTekananDarah = document.getElementById('chart-tekanan-darah').getContext('2d');
            const chartTekananDarah = new Chart(ctxTekananDarah, configTekananDarah);

            const ctxImt = document.getElementById('chart-imt').getContext('2d');
            const chartImt = new Chart(ctxImt, configImt);

            const ctxAsamUrat = document.getElementById('chart-asam-urat').getContext('2d');
            const chartAsamUrat = new Chart(ctxAsamUrat, configAsamUrat);

            // Untuk event handling
            const chartContainers = document.querySelectorAll('.chart-container');
            const overlay = document.getElementById('overlay');

            chartContainers.forEach(container => {
                container.addEventListener('click', () => {
                    container.classList.toggle('clicked');
                    overlay.classList.toggle('active');
                });
            });

            overlay.addEventListener('click', () => {
                chartContainers.forEach(container => {
                    container.classList.remove('clicked');
                });
                overlay.classList.remove('active');
            });
        </script>

        @include('components.footer')
    </body>

    </html>
@endsection
