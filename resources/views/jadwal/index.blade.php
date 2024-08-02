@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>

    <!-- Tombol Tambah Jadwal -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('buatJadwal') }}" class="flex items-center bg-blue-500 text-white font-semibold py-2 px-4 rounded-full shadow-lg hover:bg-blue-600 transition duration-300 ease-in-out">
            <i class="bi bi-calendar-plus text-xl mr-2"></i>
            <span>Tambah Jadwal</span>
        </a>
    </div>

    <!-- Daftar Jadwal -->
    <div class="bg-gray-50 p-6 rounded-xl shadow-lg space-y-4">
        @forelse ($schedules as $schedule)
            <div class="bg-white p-4 rounded-lg flex justify-between items-center shadow-sm hover:shadow-lg transition-shadow duration-300 ease-in-out">
                <div class="flex items-center space-x-4">
                    <i class="bi bi-calendar-event text-4xl text-blue-500"></i>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">{{ $schedule->nama_tempat }}</h3>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->tanggal)->format('d F Y') }}</p>
                    </div>
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
</div>
@endsection
