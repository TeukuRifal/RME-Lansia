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

    {{-- bg-gradient-to-b  from-blue-400 to-[#edf5f8] --}}

    <body class="font-sans bg-gradient-to-b  from-blue-400 to-[#edf5f8]">
        <div class="h-screen flex">
            <div class="w-full md:w-1/2 flex justify-center items-center p-8 md:p-20 mx-10">
                <div class="mx-auto slide-in-up">
                    <h1 class="text-4xl font-bold mb-4 text-center md:text-left">Halo, {{ $pasien->nama_lengkap }}</h1>
                    <p class="text-xl mb-8 text-justify leading-8">Jangan lupa untuk terus olahraga dan cek kesehatan ya!
                        Mau lihat perkembangan lebih lanjut?</p>
                    <a href="#perkembangan" class="btn-3d text-black font-semibold py-2 px-6 rounded-full">Lihat
                        Perkembangan</a>
                </div>
            </div>
            <div class="flex-auto hidden md:flex justify-center items-center">
                <img src="{{ asset('images/LansiaLogoFix.png') }}" alt="Welcome Image" class="w-3/4 md:w-auto h-auto">
            </div>
        </div>

        <div id="perkembangan" class=" container p-5 bg-white shadow-md rounded-lg mx-5 my-10">
            <h2 class="text-3xl font-bold text-center mb-10">Grafik Perkembangan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach (['Lingkar Perut', 'Gula Darah', 'Kolesterol'] as $grafik)
                    <div class="chart-container bg-white rounded-lg shadow-lg p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-xl font-semibold">{{ $grafik }}</h5>
                        </div>
                        <div>
                            <canvas id="chart-{{ strtolower(str_replace(' ', '-', $grafik)) }}"></canvas>
                        </div>
                    </div>
                @endforeach

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
                <div
                    class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                    {{ $statusKolesterol == 'Normal' ? 'bg-green-200' : ($statusKolesterol == 'Tinggi' ? 'bg-red-200' : 'bg-blue-200') }}">
                    <h2 class="text-lg font-bold mb-2">Kolesterol</h2>
                    <p class="text-xl">{{ $statusKolesterol }}</p>
                </div>

                <div
                    class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                    {{ $statusIMT == 'Berat badan normal' ? 'bg-green-200' : ($statusIMT == 'Kelebihan berat badan/obesitas' ? 'bg-red-200' : 'bg-yellow-200') }}">
                    <h2 class="text-lg font-bold mb-2">Indeks Massa Tubuh (IMT)</h2>
                    <p class="text-xl">{{ $statusIMT }}</p>
                </div>

                <div
                    class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                    {{ $statusLingkarPerut == 'Normal' ? 'bg-green-100' : ($statusLingkarPerut == 'Tinggi' ? 'bg-red-100' : 'bg-white') }}">
                    <h2 class="text-lg font-bold mb-2">Lingkar Perut</h2>
                    <p class="text-xl">{{ $statusLingkarPerut }}</p>
                </div>

                <div
                    class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                    {{ $statusTekananDarah == 'Normal'
                        ? 'bg-green-200'
                        : ($statusTekananDarah == 'Pra-hipertensi'
                            ? 'bg-yellow-200'
                            : ($statusTekananDarah == 'Hipertensi tingkat 1'
                                ? 'bg-orange-200'
                                : ($statusTekananDarah == 'Hipertensi tingkat 2'
                                    ? 'bg-red-200'
                                    : ($statusTekananDarah == 'Hipertensi Sistolik Terisolasi'
                                        ? 'bg-blue-200'
                                        : 'bg-gray-200')))) }}">
                    <h2 class="text-lg font-bold mb-2">Tekanan Darah</h2>
                    <p class="text-xl">{{ $statusTekananDarah }}</p>
                </div>
            </div>
            <!-- Jadwal Pemeriksaan Selanjutnya -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-5 ">
                <h2 class="text-xl font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
                @if ($schedules->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-blue-50">
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
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
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
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutCubic'
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
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
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
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutCubic'
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
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
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
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutCubic'
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
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
                        }, {
                            label: 'Diastolik',
                            data: dataTekananDarahDiastolik,
                            borderColor: 'rgb(54, 162, 235)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
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
                                        if (context.dataset.label === 'Sistolik') {
                                            return 'Tekanan Darah Sistolik: ' + context.raw + ' mmHg';
                                        } else {
                                            return 'Tekanan Darah Diastolik: ' + context.raw + ' mmHg';
                                        }
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutCubic'
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
                            borderColor: 'rgb(255, 206, 86)',
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderWidth: 2,
                            tension: 0.3, // Smoother curve
                            pointRadius: 5, // Radius of points
                            pointHoverRadius: 7, // Radius of points on hover
                            fill: true // Fill area under the curve
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
                                        return 'IMT: ' + context.raw;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1
                                }
                            }
                        },
                        animation: {
                            duration: 1000,
                            easing: 'easeInOutCubic'
                        }
                    }
                });
            });
        </script>
    </body>

    </html>
@endsection
