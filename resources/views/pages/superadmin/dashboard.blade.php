@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-8 text-center">Dashboard Admin</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Pengguna -->
        <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
            <i class="bi bi-person-fill text-3xl text-blue-600 mr-4"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Pengguna</h2>
                <p class="text-3xl font-bold">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Total Rekaman -->
        <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
            <i class="bi bi-journal-text text-3xl text-red-600 mr-4"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Rekaman</h2>
                <p class="text-3xl font-bold">{{ $totalRecords }}</p>
            </div>
        </div>

        <!-- Pasien Baru -->
        <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
            <i class="bi bi-person-add text-3xl text-green-600 mr-4"></i>
            <div>
                <h2 class="text-lg font-semibold">Pasien Baru Bulan Ini</h2>
                <p class="text-3xl font-bold">{{ $newPatientsCount }}</p>
            </div>
        </div>

        <!-- Total Jadwal -->
        <div class="bg-white p-4 rounded-lg shadow-md flex items-center">
            <i class="bi bi-calendar-event text-3xl text-purple-600 mr-4"></i>
            <div>
                <h2 class="text-lg font-semibold">Total Jadwal</h2>
                <p class="text-3xl font-bold">{{ $totalSchedules }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <!-- Grafik Rekaman per Bulan -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-8">
            <h2 class="text-lg font-semibold mb-4 flex items-center">
                <i class="bi bi-bar-chart-line text-xl text-blue-600 mr-2"></i>
                Grafik Rekaman per Bulan
            </h2>
            <canvas id="recordChart"></canvas>
        </div>

        <!-- Jadwal Pemeriksaan Selanjutnya -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-5 border border-blue-100">
            <h2 class="text-xl font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
            @if ($schedules->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-blue-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Waktu Mulai
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Waktu Selesai
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lokasi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $schedule->nama_tempat }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $schedule->tanggal }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $schedule->waktu_mulai }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $schedule->waktu_selesai }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $schedule->lokasi }}
                                    </td>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Script untuk grafik batang menggunakan Chart.js
const ctx = document.getElementById('recordChart').getContext('2d');
const recordChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($months), // Labels dari bulan
        datasets: [{
            label: 'Jumlah Rekaman',
            data: @json($recordCounts), // Data jumlah rekaman per bulan
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Bulan',
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah Rekaman',
                }
            }
        }
    }
});
</script>
@endsection
