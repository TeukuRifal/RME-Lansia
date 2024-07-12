@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Animation with Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes wave {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(-25%);
            }
            100% {
                transform: translateX(0);
            }
        }
        .waves g {
            animation: wave 10s cubic-bezier(0.36, 0.45, 0.63, 0.53) infinite;
        }
        .wave {
            height: 100px;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0);
            }
        }
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }
        .slide-in {
            animation: slideIn 2s ease-in-out;
        }
        .slide-in-up {
            animation: slideInUp 2s ease-in-out;
        }
        .float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="font-sans">
    <!-- Section Home -->
    <div class="h-screen flex flex-col md:flex-row">
        <div class="flex-auto flex justify-center items-center p-8 md:p-20">
            <div class="mx-auto slide-in-up">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di REMELA</h1>
                <h3 class="text-3xl font-bold mb-4">Website Rekam Medik Elektronik Lansia</h3>
                <p class="text-xl mb-8">Silahkan masuk untuk mengakses halaman kesehatan Anda !!!</p>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Login</a>
            </div>
        </div>
        <div class="flex-auto hidden md:flex justify-center items-center">
            <img src="{{ asset('images/Lansia.png') }}" alt="Welcome Image" class="w-4/8 h-auto slide-in float">
        </div>
    </div>
    
    <!-- Section Wave -->
    <div class="wave w-full flex flex-wrap">
        <svg class="waves w-full" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave"
                    d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="moving-waves">
                <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40)" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1)" />
            </g>
        </svg>
    </div>

    <!-- Section Profile -->
    <div id="profile" class="mx-auto mt-32 p-5 rounded-xl bg-white">
        <h2 class="mt-5 text-3xl font-bold mb-8 text-center">Profil Posbindu</h2>
        <div class="flex">
            <div class="w-1/2 p-5">
                <img src="{{ asset('images/profile.png') }}" alt="Posbindu Image" class="w-full h-auto rounded-lg">
            </div>
            <div class="w-1/2 p-5">
                <div class="grid grid-cols-1 gap-6 mt-5">
                    <div class="flex items-center">
                        <img src="{{ asset('images/visi.png') }}" alt="Visi Image" class="w-32 h-auto">
                        <div class="ml-4">
                            <h3 class="text-2xl font-semibold mb-2">Visi</h3>
                            <p>Menjadi Posbindu terbaik di Indonesia yang memberikan pelayanan kesehatan terbaik kepada lansia di masyarakat.</p>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <img src="{{ asset('images/misi.png') }}" alt="Misi Image" class="w-32 h-auto">
                        <div class="ml-4">
                            <h3 class="text-2xl font-semibold mb-2">Misi</h3>
                            <p>Menjadi Posbindu terbaik di Indonesia yang memberikan pelayanan kesehatan terbaik kepada lansia di masyarakat.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <button type="button" class="text-black font-semibold bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 rounded-lg text-sm px-5 py-2.5">Baca Selengkapnya</button>
                </div>
            </div>
        </div>
        
    </div>


    <!-- Section Jadwal -->
    <div id="profile" class="mx-auto p-5 rounded-xl bg-white">
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


    <!-- Section Galeri -->
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
            const location = { lat: 5.570961460675884, lng: 95.37579360197435 };

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
