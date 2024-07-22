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
                box-shadow: 5px 5px 10px rgba(74, 163, 195, 0.3), -5px -5px 10px rgba(126, 223, 253, 0.3);
                transition: all 0.3s ease-in-out;
            }

            .btn-3d:hover {
                box-shadow: 10px 10px 20px rgba(74, 163, 195, 0.3), -10px -10px 20px rgba(126, 223, 253, 0.3);
                transform: translateY(-5px);
            }
        </style>
    </head>

    <body class="font-sans bg-gradient-to-b from-lightblue to-[#edf5f8]">
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
                <img src="{{ asset('images/LansiaLogoFix.png') }}" alt="Welcome Image" class="w-auto h-100 slide-in float">
            </div>
        </div>

        <div id="perkembangan" class="p-5 bg-white">
            <h2 class="text-3xl font-bold text-center mb-14">Grafik Perkembangan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-auto">
                @foreach (['Lingkar Perut', 'Gula Darah', 'Kolesterol'] as $grafik)
                    <div class="chart-container bg-white rounded-lg shadow-md p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-2xl font-semibold">{{ $grafik }}</h5>
                            {{-- <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500">
                                Normal
                                <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                </svg>
                            </div> --}}
                        </div>
                        <div>
                            <canvas id="chart-{{ strtolower(str_replace(' ', '-', $grafik)) }}"></canvas>
                        </div>
                    </div>
                @endforeach

                <!-- Chart untuk Tekanan Darah -->
                <div class="chart-container bg-white rounded-lg shadow-md p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-2xl font-semibold">Tekanan Darah</h5>
                        {{-- <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500">
                            Normal
                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                            </svg>
                        </div> --}}
                    </div>
                    <div>
                        <canvas id="chart-tekanan-darah"></canvas>
                    </div>
                </div>

                <!-- Chart untuk IMT -->
                <div class="chart-container bg-white rounded-lg shadow-md p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-2xl font-semibold">IMT (Indeks Massa Tubuh)</h5>
                        {{-- <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500">
                            Normal
                            <svg class="w-4 h-4 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                            </svg>
                        </div> --}}
                    </div>
                    <div>
                        <canvas id="chart-imt"></canvas>
                    </div>
                </div>
            </div>
            <div class="kategori flex shadow-lg rounded-md p-2 m-2 justify-between">
                <!-- Pemberitahuan Kategori IMT -->
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <h6 class="text-xl font-semibold mb-2">Kategori Indeks Massa Tubuh</h6>
                    @forelse($imtCategories as $category)
                        <p>{{ $category['date'] }}: {{ $category['category'] }}</p>
                    @empty
                        <p>Tidak ada data IMT.</p>
                    @endforelse
                </div>

                <!-- Pemberitahuan Kategori Kolesterol -->
                <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <h6 class="text-xl font-semibold mb-2">Kategori Kolesterol</h6>
                    @forelse($kolesterolCategories as $category)
                        <p>{{ $category['date'] }}: {{ $category['category'] }}</p>
                    @empty
                        <p>Tidak ada data kolesterol.</p>
                    @endforelse
                </div>

                <!-- Pemberitahuan Kategori Tekanan Darah -->
                <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <h6 class="text-xl font-semibold mb-2">Kategori Tekanan Darah</h6>
                    @forelse($tekananDarahCategories as $category)
                        <p>{{ $category['date'] }}: {{ $category['category'] }}</p>
                    @empty
                        <p>Tidak ada data tekanan darah.</p>
                    @endforelse
                </div>
            </div>

            <!-- Jadwal Pemeriksaan Selanjutnya -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
                @if ($schedules->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Waktu Mulai</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Waktu Selesai</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lokasi</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $schedule->nama_tempat }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $schedule->tanggal }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $schedule->waktu_mulai }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $schedule->waktu_selesai }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $schedule->lokasi }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">Belum ada jadwal pemeriksaan yang tersedia.</p>
                @endif
            </div>

            


        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctxLingkarPerut = document.getElementById('chart-lingkar-perut').getContext('2d');
                var ctxGulaDarah = document.getElementById('chart-gula-darah').getContext('2d');
                var ctxKolesterol = document.getElementById('chart-kolesterol').getContext('2d');
                var ctxTekananDarah = document.getElementById('chart-tekanan-darah').getContext('2d');
                var ctxIMT = document.getElementById('chart-imt').getContext('2d');

                var dataLingkarPerut = @json($dataPerGrafik['Lingkar Perut']);
                var dataGulaDarah = @json($dataPerGrafik['Gula Darah']);
                var dataKolesterol = @json($dataPerGrafik['Kolesterol']);
                var dataTekananDarahSistolik = @json($dataPerGrafik['Tekanan Darah Sistolik']);
                var dataTekananDarahDiastolik = @json($dataPerGrafik['Tekanan Darah Diastolik']);
                var labels = @json($recordDates);
                var imtDates = @json($imtDates);
                var imtValues = @json($imtValues);

                // Grafik Lingkar Perut
                new Chart(ctxLingkarPerut, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Lingkar Perut',
                            data: dataLingkarPerut,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
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
                                    label: function(context) {
                                        return 'Lingkar Perut: ' + context.raw + ' cm';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Grafik Gula Darah
                new Chart(ctxGulaDarah, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Gula Darah',
                            data: dataGulaDarah,
                            borderColor: 'rgb(153, 102, 255)',
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
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
                                    label: function(context) {
                                        return 'Gula Darah: ' + context.raw + ' mg/dL';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Grafik Kolesterol
                new Chart(ctxKolesterol, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Kolesterol',
                            data: dataKolesterol,
                            borderColor: 'rgb(255, 159, 64)',
                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
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
                                    label: function(context) {
                                        return 'Kolesterol: ' + context.raw + ' mg/dL';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Grafik Tekanan Darah
                new Chart(ctxTekananDarah, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Sistolik',
                                data: dataTekananDarahSistolik,
                                borderColor: 'rgb(255, 99, 132)',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderWidth: 1
                            },
                            {
                                label: 'Diastolik',
                                data: dataTekananDarahDiastolik,
                                borderColor: 'rgb(54, 162, 235)',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.raw + ' mmHg';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Grafik IMT
                new Chart(ctxIMT, {
                    type: 'line',
                    data: {
                        labels: imtDates,
                        datasets: [{
                            label: 'IMT',
                            data: imtValues,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
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
                                    label: function(context) {
                                        return 'IMT: ' + context.raw + ' kg/m²';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </body>

    </html>
@endsection
