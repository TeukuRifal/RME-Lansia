@extends('layouts.main')

@section('content')
    <!-- Jadwal Pemeriksaan Selanjutnya -->
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg mb-6">
        <h2 class="text-2xl font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
        @if ($schedules->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Nama Tempat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Waktu Mulai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Waktu Selesai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($schedules as $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $schedule->nama_tempat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->tanggal }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->waktu_mulai }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->waktu_selesai }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $schedule->lokasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">Belum ada jadwal pemeriksaan yang tersedia.</p>
        @endif
    </div>

    <!-- Dokumentasi -->
    <div id="galeri" class="container mx-auto p-5 rounded-xl bg-white">
        <h2 class="text-3xl font-bold mb-8 text-center">Dokumentasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="gallery-item bg-gray-100 p-4 rounded-lg shadow-sm">
                <img src="{{ asset('images/posbindu1.jpg') }}" alt="Gallery Image 1" class="w-full h-48 object-cover rounded-lg shadow-lg mb-2">
                <p class="text-lg font-semibold">Foto Bersama Kader Posyandu Lansia & Posbindu Ptm</p>
            </div>
            <div class="gallery-item bg-gray-100 p-4 rounded-lg shadow-sm">
                <img src="{{ asset('images/posbindu2.jpg') }}" alt="Gallery Image 2" class="w-full h-48 object-cover rounded-lg shadow-lg mb-2">
                <p class="text-lg font-semibold">Pemeriksaan Kesehatan Lansia</p>
            </div>
            <div class="gallery-item bg-gray-100 p-4 rounded-lg shadow-sm">
                <img src="{{ asset('images/posbindu3.jpg') }}" alt="Gallery Image 3" class="w-full h-48 object-cover rounded-lg shadow-lg mb-2">
                <p class="text-lg font-semibold">Pengukuran Lingkar Pinggang Sebagai Bagian Dari Pengecekan Kesehatan</p>
            </div>
        </div>
    </div>

    <!-- Peta Lokasi -->
    <div id="map" class="container mx-auto mt-10" style="height: 400px; width: 100%;"></div>

    <script>
        function initMap() {
            const location = { lat: 5.570961460675884, lng: 95.37579360197435 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
            });
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Kantor Keuchik Kopelma Darussalam",
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
@endsection
