@extends('layouts.main')

@section('content')
<!-- Jadwal Pemeriksaan Selanjutnya -->
<div class=container "bg-white shadow-md rounded-lg p-6 mb-6  ">
   
    
    <div class="jadwal bg-white  m-3 rounded-lg p-2">
        <h2 class="text-xl px-4 font-semibold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
        @if ($schedules->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Tempat</th>
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
<div id="galeri" class="mx-5 p-5 rounded-xl bg-white mt-10 shadow-lg">
    <h2 class="text-xl mb-8 text-center">Dokumentasi</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ([1, 2, 3] as $i)
        <div class="gallery-item bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/posbindu' . $i . '.jpg') }}" alt="Gallery Image {{ $i }}"
                 class="w-full h-64 object-cover">
            <p class="p-5">Pertemuan {{ $i }}</p>
        </div>
        @endforeach
    </div>
</div>



<script>
    function initMap() {
        const location = {
            lat: 5.570961460675884,
            lng: 95.37579360197435
        };

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
