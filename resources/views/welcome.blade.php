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
            body {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='1920' height='1200' preserveAspectRatio='none' viewBox='0 0 1920 1200'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1089%26quot%3b)' fill='none'%3e%3crect width='1920' height='1200' x='0' y='0' fill='rgba(173%2c 217%2c 216%2c 1)'%3e%3c/rect%3e%3cpath d='M0%2c676.236C126.532%2c650.675%2c253.604%2c633.382%2c362.423%2c563.941C471.483%2c494.347%2c539.947%2c385.505%2c617.67%2c282.081C717.116%2c149.751%2c867.618%2c38.216%2c881.466%2c-126.736C895.962%2c-299.401%2c826.148%2c-490.071%2c691.669%2c-599.335C560.038%2c-706.285%2c369.02%2c-668.728%2c199.831%2c-680.562C65.948%2c-689.927%2c-61.003%2c-677.96%2c-194.174%2c-661.296C-354.603%2c-641.221%2c-553.888%2c-693.867%2c-661.082%2c-572.831C-768.084%2c-452.012%2c-702.64%2c-260.483%2c-691.758%2c-99.46C-682.917%2c31.352%2c-637.434%2c149.012%2c-603.735%2c275.717C-562.152%2c432.067%2c-605.381%2c642.777%2c-470.565%2c732.214C-336.214%2c821.343%2c-158.035%2c708.161%2c0%2c676.236' fill='%2378c0bf'%3e%3c/path%3e%3cpath d='M1920 1830.9009999999998C2035.719 1843.125 2140.294 1751.929 2220.561 1667.682 2291.119 1593.625 2284.638 1478.0230000000001 2338.848 1391.281 2405.16 1285.174 2557.2619999999997 1230.673 2571.37 1106.347 2585.475 982.042 2507.477 853.265 2408.593 776.631 2314.108 703.406 2180.991 732.5419999999999 2063.149 712.479 1961.464 695.1669999999999 1861.85 635.902 1763.436 666.792 1665.467 697.5419999999999 1612.0149999999999 797.2629999999999 1545.045 875.1 1478.327 952.644 1381.0030000000002 1019.335 1372.409 1121.268 1363.859 1222.684 1450.1 1303.284 1501.542 1391.103 1547.528 1469.607 1594.938 1542.309 1657.652 1608.221 1738.353 1693.038 1803.573 1818.603 1920 1830.9009999999998' fill='%23e2f2f1'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1089'%3e%3crect width='1920' height='1200' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
            }

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

    <body class=" font-teko">
        <!-- Section Home -->
        <div class="h-screen flex flex-col md:flex-row ">
            <div class="flex-auto flex justify-center items-center p-8 md:p-20">
                <div class="mx-auto slide-in-up">
                    <h1 class="text-4xl font-bold  mb-4">Selamat Datang di REMELA</h1>
                    <h3 class="text-3xl font-bold mb-4">Website Rekam Medik Elektronik Lansia</h3>
                    <p class="text-xl mb-8">Silahkan masuk untuk mengakses halaman kesehatan Anda !!!</p>
                    <a href="{{ route('login') }}" class=" bg-lightblue shadow-lg text-white py-2 px-4 rounded">Masuk</a>
                </div>
            </div>
            <div class="flex-auto hidden md:flex justify-center items-center">
                <img src="{{ asset('images/LansiaLogoFix.png') }}" alt="Welcome Image" class="w-auto h-100 slide-in float">
            </div>
        </div>

        <!-- Section Wave -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,32L48,53.3C96,75,192,117,288,149.3C384,181,480,203,576,186.7C672,171,768,117,864,101.3C960,85,1056,107,1152,101.3C1248,96,1344,64,1392,48L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>

        <!-- Section profil -->
        <div id="profil" class="mx-auto p-5 rounded-xl bg-white">
            <h2 class="mt-5 text-3xl font-bold mb-8 text-center">Profil Posbindu</h2>
            <div class="flex">
                <div class="w-1/2 p-5">
                    <img src="{{ asset('images/posbindu2.jpg') }}" alt="Posbindu Image" class="w-full h-auto rounded-lg">
                </div>
                <div class="w-1/2 p-5">
                    <div class="grid grid-cols-1 gap-6 mt-5 text-2xl">
                        <div class="flex items-center">
                            <img src="{{ asset('images/visi.png') }}" alt="Visi Image" class="w-32 h-auto">
                            <div class="ml-4">
                                <h3 class="text-2xl font-semibold mb-2">Visi</h3>
                                <p>Menjadi solusi digital terdepan dalam pemantauan kesehatan lansia, yang mendukung
                                    peningkatan kualitas hidup melalui inovasi dan teknologi yang mudah diakses.</p>
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <img src="{{ asset('images/misi.png') }}" alt="Misi Image" class="w-32 h-auto">
                            <div class="ml-4 font-roboto">
                                <h3 class="text-2xl font-semibold mb-2">Misi</h3>
                                <p>Mempermudah Akses Informasi Kesehatan</p>
                                <p>Meningkatkan Kesadaran Akan Kesehatan</p>
                                <p>Menawarkan rekomendasi kesehatan yang dipersonalisasi berdasarkan data pengguna</p>
                                <p>Mendorong Gaya Hidup Sehat</p>
                                <p>Terus mengembangkan fitur dan teknologi baru yang mendukung kebutuhan kesehatan lansia.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-16">
                        <button type="button"
                            class="text-black font-semibold bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 rounded-lg text-sm px-5 py-2.5">Baca
                            Selengkapnya</button>
                    </div>
                </div>
            </div>

        </div>




        <!-- Section Galeri -->
        <div id="galeri" class=" h-screen m-auto p-5 rounded-xl bg-white">
            <h2 class="text-3xl font-bold mb-8 text-center mt-10 bg">Galeri</h2>
            <div class=" shadow-sm grid grid-cols-1 md:grid-cols-3 m-auto w-3/4 h-auto gap-8 text-xl">
                <div class="gallery-item">
                    <img src="{{ asset('images/posbindu1.jpg') }}" alt="Gallery Image 1"
                        class="w-auto  rounded-lg shadow-lg">
                    <p class="h-32 shadow-md bg-white rounded-lg p-5">Foto Bersama Kader Posyandu Lansia & Posbindu Ptm </p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images//posbindu2.jpg') }}" alt="Gallery Image 2"
                        class="w-auto  rounded-lg shadow-lg">
                    <p class="h-32 shadow-md bg-white rounded-lg p-5">Pemeriksaan Kesehatan Lansia </p>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('images//posbindu3.jpg') }}" alt="Gallery Image 3"
                        class="w-auto rounded-lg shadow-lg">
                    <p class="h-30 shadow-md bg-white rounded-lg p-5">Pengukuran Lingkar Pinggang Sebagai Bagian Dari
                        Pengecekan Kesehatan</p>
                </div>
            </div>
        </div>

      

    </body>

    </html>
@endsection
