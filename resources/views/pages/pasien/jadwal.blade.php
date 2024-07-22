@extends('layouts.main')

@section('content')
<div id="profil" class="mx-5 p-5 rounded-xl bg-white mt-10 shadow-lg"></div>

<div id="galeri" class="mx-5 p-5 rounded-xl bg-white mt-10 shadow-lg">
    <h2 class="text-3xl font-bold mb-8 text-center">Galeri</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ([1, 2, 3] as $i)
        <div class="gallery-item bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/galeri' . $i . '.jpeg') }}" alt="Gallery Image {{ $i }}"
                 class="w-full h-64 object-cover">
            <p class="p-5">Pertemuan {{ $i }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="waktu-tempat flex justify-between items-start m-5 bg-white">
    <div class="w-1/2 mr-4">
        <h2 class="text-2xl font-bold mb-4 text-center p-5">Jadwal Pelayanan</h2>
        <div class="bg-blue-50 p-6 rounded-xl mx-6">
            @foreach ($jadwal as $schedule)
            <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center shadow-sm">
                <div>
                    <h3 class="text-xl font-semibold">{{ $schedule->nama_tempat }}</h3>
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->tanggal)->format('d F Y') }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }} WIB</p>
                    <p class="text-sm text-gray-600">{{ $schedule->lokasi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="w-1/2 ml-4 p-4 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Map Location</h1>
        <div id="map" class="rounded-lg shadow-md" style="height: 400px;"></div>
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
