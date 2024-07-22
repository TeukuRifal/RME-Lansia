@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="font-semibold my-3">Dashboard Admin</h1>

        <!-- Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-blue-100 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">Total Pasien</h2>
                <p class="text-2xl">{{ $totalPatients }}</p>
            </div>
            <div class="bg-green-100 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">Jumlah Lansia</h2>
                <p class="text-2xl"></p>
            </div>
            <div class="bg-yellow-100 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">Total Admin</h2>
                <p class="text-2xl">{{ $totalAdmins }}</p>
            </div>
            <div class="bg-red-100 p-4 rounded-lg shadow-md">
                <h2 class="text-lg font-bold">Total Super Admin</h2>
                <p class="text-2xl">{{ $totalSuperAdmins }}</p>
            </div>
        </div>

        <!-- Grafik dan Diagram -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Distribusi Jenis Kelamin</h2>
                <canvas id="genderChart" width="400" height="300"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-bold mb-2">Distribusi Usia</h2>
                <canvas id="ageChart" width="400" height="300"></canvas>
            </div>
        </div>

        <!-- Jadwal Kegiatan -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h2 class="text-lg font-bold mb-2">Jadwal Kegiatan</h2>
            <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
            @forelse ($schedules as $schedule)
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center shadow-sm">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $schedule->nama_tempat }}</h3>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->tanggal)->format('d F Y') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }} WIB</p>
                        <p class="text-sm text-gray-600">{{ $schedule->lokasi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-600">Tidak ada jadwal pelayanan tersedia saat ini.</p>
            @endforelse
        </div>
            <a href="{{ route('buatJadwal') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Tambah Jadwal Baru</a>
        </div>

        <!-- Navigasi Cepat -->
        <div class="flex justify-end mt-4">
            <a href="{{ route('tambahPasien') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mr-2">Tambah Pasien Baru</a>
            <a href="{{ route('daftarPasien') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Kelola Data Pasien</a>
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
        var genderChart = new Chart(ctxGender, {
            type: 'pie',
            data: {
                labels: genderLabels,
                datasets: [{
                    data: genderCounts,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'],
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

        

    });
</script>

@endsection
