@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>
        
        <div class="flex justify-end mb-4">
            <a href="{{ route('buatJadwal') }}" class="btn-3d text-black font-semibold py-2 px-4 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-300 ease-in-out">
                Tambah Jadwal
            </a>
        </div>
        
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
    </div>
@endsection
