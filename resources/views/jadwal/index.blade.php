@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>
        
        <div class="flex justify-end mb-4">
            <a href="{{ route('buatJadwal') }}" class="btn-3d text-white font-semibold py-2 px-4 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-300 ease-in-out flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-5h-5v5zM12 20h5v-5h-5v5zM7 20h5v-5H7v5zM3 20h5v-5H3v5zM17 14h5v-5h-5v5zM12 14h5v-5h-5v5zM7 14h5v-5H7v5zM3 14h5v-5H3v5zM17 8h5V3h-5v5zM12 8h5V3h-5v5zM7 8h5V3H7v5zM3 8h5V3H3v5z" />
                </svg>
                <span>Tambah Jadwal</span>
            </a>
        </div>
        
        <div class="bg-gray-50 p-6 rounded-xl shadow-lg space-y-4">
            @forelse ($schedules as $schedule)
                <div class="bg-white p-4 rounded-lg flex justify-between items-center shadow-sm hover:shadow-lg transition-shadow duration-300 ease-in-out">
                    <div class="flex items-center space-x-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
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
