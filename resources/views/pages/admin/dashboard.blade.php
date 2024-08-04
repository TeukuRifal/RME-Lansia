@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <!-- Form Pencarian -->
    <div class="container mx-auto px-4 py-8">
        <!-- Form Pencarian -->
        <div class="px-6 mb-8">
            <form id="searchForm" class="relative flex items-center">
                <input type="text" id="default-search" name="search" placeholder="Cari pasien..."
                    class="form-control flex-grow border border-gray-300 rounded-l-md p-2 focus:ring-blue-500 focus:border-blue-500">
                <button type="submit"
                    class="btn btn-primary ml-2 justify-between flex  bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <i class="bi bi-search mr-2 "></i> Cari
                </button>
                <div id="searchResults"
                    class="hidden absolute bg-white border border-gray-200 rounded-md shadow-lg mt-12 w-full max-h-60 overflow-y-auto z-10">
                    <!-- Hasil pencarian akan muncul di sini -->
                </div>
            </form>
        </div>

        <!-- Dashboard Konten -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="font-semibold text-2xl mb-6">Dashboard Admin</h1>

            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-blue-100 p-4 rounded-lg shadow-md flex items-center">
                    <i class="bi bi-person-lines-fill text-blue-500 text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-bold">Total Klien</h2>
                        <p class="text-2xl">{{ $totalPatients }}</p>
                    </div>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow-md flex items-center">
                    <i class="bi bi-person-fill text-green-500 text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-bold">Jumlah Lansia</h2>
                        <p class="text-2xl">{{ $totalElderly }}</p>
                    </div>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg shadow-md flex items-center">
                    <i class="bi bi-person-check text-yellow-500 text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-bold">Total Admin</h2>
                        <p class="text-2xl">{{ $totalAdmins }}</p>
                    </div>
                </div>
                <div class="bg-red-100 p-4 rounded-lg shadow-md flex items-center">
                    <i class="bi bi-shield-check text-red-500 text-3xl mr-4"></i>
                    <div>
                        <h2 class="text-lg font-bold">Super Admin</h2>
                        <p class="text-2xl">{{ $totalSuperAdmins }}</p>
                    </div>
                </div>
            </div>

            <!-- Grafik dan Diagram -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-bold mb-2">Distribusi Jenis Kelamin</h2>
                    <canvas id="genderChart" width="400" height="300"></canvas>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h2 class="text-lg font-bold mb-2">Distribusi Usia</h2>
                    <canvas id="ageChart" width="400" height="300"></canvas>
                </div>
            </div>

            <!-- Jadwal Pemeriksaan Selanjutnya -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 mt-5 border border-blue-100">
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

            <!-- Navigasi Cepat -->
            <div class="flex justify-end mt-4 space-x-2">
                <a href="{{ route('tambahPasien') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded flex items-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <i class="bi bi-person-plus mr-2"></i> Tambah Klien Baru
                </a>
                <a href="{{ route('daftarPasien') }}"
                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded flex items-center focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    <i class="bi bi-person-gear mr-2"></i> Kelola Data Klien
                </a>
            </div>
        </div>
    </div>
    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk chart jenis kelamin
            var genderLabels = {!! json_encode($genderLabels) !!};
            var genderCounts = {!! json_encode($genderCounts) !!};

            var ctxGender = document.getElementById('genderChart').getContext('2d');
            new Chart(ctxGender, {
                type: 'pie',
                data: {
                    labels: genderLabels,
                    datasets: [{
                        data: genderCounts,
                        backgroundColor: ['rgb(163, 216, 255)', 'rgb(255, 180, 194)'],
                        borderColor: ['rgb(163, 216, 255)', 'rgb(163, 216, 255)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });

            // Data untuk chart usia
            var ageLabels = {!! json_encode($ageLabels) !!};
            var ageCounts = {!! json_encode($ageCounts) !!};

            var ctxAge = document.getElementById('ageChart').getContext('2d');
            new Chart(ctxAge, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: 'Jumlah Pasien',
                        data: ageCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    },
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pencarian Pasien
            document.getElementById('default-search').addEventListener('input', function() {
                const query = this.value;

                // Hanya lakukan pencarian jika query memiliki 3 karakter atau lebih
                if (query.length >= 3) {
                    fetch(`{{ route('searchPasien') }}?search=${query}`)
                        .then(response => response.json())
                        .then(data => {
                            const resultsContainer = document.getElementById('searchResults');
                            resultsContainer.innerHTML = '';
                            resultsContainer.classList.remove('hidden');

                            if (data.length > 0) {
                                data.forEach(item => {
                                    const resultItem = document.createElement('div');
                                    resultItem.classList.add('p-2', 'cursor-pointer',
                                        'hover:bg-gray-200');
                                    resultItem.textContent =
                                        `${item.nama_lengkap} (${item.nik})`;
                                    resultItem.addEventListener('click', () => {
                                        window.location.href =
                                            `{{ route('healthHistory', '') }}/${item.id}`;
                                    });
                                    resultsContainer.appendChild(resultItem);
                                });
                            } else {
                                const noResultItem = document.createElement('div');
                                noResultItem.classList.add('p-2', 'text-gray-600');
                                noResultItem.textContent = 'Nama atau NIK tidak ditemukan';
                                resultsContainer.appendChild(noResultItem);
                            }
                        });
                } else {
                    // Tampilkan pesan jika query kurang dari 3 karakter
                    const resultsContainer = document.getElementById('searchResults');
                    resultsContainer.innerHTML = '';
                    resultsContainer.classList.add('hidden');
                }
            });
        });
    </script>

    <style>
        #searchResults {
            position: absolute;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 4px;
            z-index: 1000;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }

        #searchResults div {
            padding: 8px;
            cursor: pointer;
        }

        #searchResults div:hover {
            background-color: #f1f1f1;
        }
    </style>

@endsection
