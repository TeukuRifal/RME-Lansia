@extends('layouts.main')

@section('content')
    <!-- Jadwal Pemeriksaan Selanjutnya -->
    <div class="container mx-auto p-6 bg-lightblue shadow-md rounded-lg mb-6 mt-10">
        <h2 class="text-3xl font-bold mb-4">Jadwal Pemeriksaan Selanjutnya</h2>
        @if ($schedules->isNotEmpty())
            <div class="overflow-x-auto">
                <input type="text" id="searchInput" class="mb-4 w-full px-4 py-2 border rounded-lg bg-gray-100" placeholder="Cari jadwal...">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                    <thead class="bg-gray-100 border-b border-gray-300">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Tempat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Mulai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Selesai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody id="schedulesTable" class="bg-white divide-y divide-gray-200">
                        @foreach ($schedules as $schedule)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 border-b border-gray-200">{{ $schedule->nama_tempat }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">{{ \Carbon\Carbon::parse($schedule->tanggal)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">{{ $schedule->waktu_mulai }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">{{ $schedule->waktu_selesai }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 border-b border-gray-200">{{ $schedule->lokasi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 text-xl">Belum ada jadwal pemeriksaan yang tersedia.</p>
        @endif
    </div>

    <!-- Dokumentasi -->
    <div id="galeri" class="container mx-auto p-5 rounded-xl bg-white">
        <h2 class="text-3xl font-bold mb-8 text-center">Dokumentasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-xl">
            @foreach ($aktivitas as $kegiatan)
            <div class="gallery-item relative group">
                <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}"
                    class="w-full h-64 object-cover rounded-lg shadow-lg transform group-hover:scale-105 transition duration-300 cursor-pointer"
                    onclick="openViewModal('{{ asset('storage/' . $kegiatan->gambar) }}', '{{ $kegiatan->judul }}', '{{ $kegiatan->deskripsi }}', '{{ \Carbon\Carbon::parse($kegiatan->tgl_aktivitas)->format('d M Y') }}')">
                <div class="h-32 shadow-md bg-white rounded-lg p-5 text-center mt-4 text-wrap truncate-multiline">
                    <p class="font-bold text-lg text-gray-900">{{ $kegiatan->judul }}</p>
                    <p class="text-sm text-gray-700 mt-1">{{ $kegiatan->deskripsi }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ \Carbon\Carbon::parse($kegiatan->tgl_aktivitas)->format('d M Y') }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Peta Lokasi -->
    <div id="map" class="container mx-auto mt-10 mb-10" style="height: 400px; width: 100%;"></div>

    <script>
        function initMap() {
            const location = { lat: 5.570961460675884, lng: 95.37579360197435 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: location,
                mapTypeId: 'roadmap'
            });
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Kantor Keuchik Kopelma Darussalam",
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-ZQe0OluO9e5Zg6I10Vu8PtuDqUBoO6lC8oyxz5kjEA5NIDMZZ6A1OCgBdvHe0yMaSTp5HRH8uHJFDmYFz6kK1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" integrity="sha512-D1UV2F3r5G2flwA69xEKN5O6sqA1Sx3gT6Hp5AftOjqQicOetHT2DB2zd5VIRvhFb77vv89l3XXT0zXzIxEr3Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script>
        // Search functionality for schedules
        document.getElementById('searchInput').addEventListener('input', function (e) {
            const query = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#schedulesTable tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let match = false;

                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(query)) {
                        match = true;
                    }
                });

                row.style.display = match ? '' : 'none';
            });
        });
    </script>
@endsection
