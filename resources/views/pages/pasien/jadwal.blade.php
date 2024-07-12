@extends('layouts.main')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>POSWINDU</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body class="font-sans">

        <div id="profil" class="mx-auto p-5 rounded-xl bg-white">
            <h2 class="text-center text-3xl font-bold mb-6">Jadwal Pelayanan</h2>
            <div class="bg-lightblue p-6 mx-44 mt-16 rounded-xl shadow-lg">
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">09.00 - 12.00 WIB</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg mb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-xl font-semibold">Cek Kesehatan</h3>
                        <p class="text-sm">30 Agustus 2024</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm">08.00 - 12.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="galeri" class=" h-screen m-auto p-5 rounded-xl bg-white">
            <h2 class="text-3xl font-bold mb-8 text-center mt-10 bg">Galeri</h2>
            <div class=" shadow-sm grid grid-cols-1 md:grid-cols-3 m-auto w-3/4 h-auto gap-8 text-xl">
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri1.jpeg') }}" alt="Gallery Image 1"
                        class="w-full h-auto rounded-lg shadow-lg">
                    <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan pertama </p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri2.jpeg') }}" alt="Gallery Image 2"
                        class="w-full h-auto rounded-lg shadow-lg">
                    <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan Kedua </p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images/galeri3.jpeg') }}" alt="Gallery Image 3"
                        class="w-full h-auto rounded-lg shadow-lg">
                    <p class="h-32 shadow-md bg-white rounded-lg p-5">Pertemuan Ketiga </p>
                </div>
            </div>
        </div>

        <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg mt-10">
            <h1 class="text-2xl font-bold mb-4 text-center">Map Location</h1>
            <div id="map" class="rounded-lg shadow-md" style="height: 400px; width: 100%;"></div>
        </div>

        <script>
            // Fungsi untuk menginisialisasi peta
            function initMap() {
                // Koordinat yang ingin ditampilkan
                const location = {
                    lat: 5.570961460675884,
                    lng: 95.37579360197435
                };

                // Membuat objek peta baru
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 15, // Tingkat zoom peta
                    center: location, // Posisi tengah peta
                });

                // Menambahkan marker pada peta di lokasi yang ditentukan
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Kantor Keuchik Kopelma Darussalam", // Judul marker (opsional)
                });
            }
        </script>

        <!-- Memuat Google Maps API dengan callback ke initMap -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>


        @include('components.footer')
    </body>

    </html>
@endsection
