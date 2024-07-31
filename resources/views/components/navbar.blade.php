<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <style>
        .hover-text:hover {
            color: #101090;
        }
        body {
            margin: 0;
            padding: 0;
        }
        /* Custom shadow to ensure visibility */
        .custom-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adjust as needed */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="border-gray-200 bg-lightblue  dark:border-gray-700 px-6 shadow-md">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('beranda') }}" class="text-3xl font-bold flex items-center">
                    <img src="{{ asset('images/LansiaLogoFix.png') }}" class="w-24 h-auto mr-4 font-roboto rounded-full" alt="logo">
                    REMELA
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-8 text-xl font-bold ">
                @guest
                    <a href="{{ route('login') }}" class="hover-text text-2xl font-bold">Masuk</a>
                @endguest
                @auth
                    <a href="{{ route('beranda') }}" class="hover-text">Dashboard</a>
                    <a href="{{ route('jadwal') }}" class="hover-text">Jadwal Dokter</a>
                    <a href="{{ route('profil') }}" class="hover-text">Profil</a>
                    {{-- <a href="{{ route('pasien') }}" class="hover:text-gray-300">Data Pasien</a> --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="hover-text">
                            <span class="logout-text text-xl font-semibold"></span>
                            <i class="hover-text mr-10 bi bi-box-arrow-right logout-icon"></i>                           
                        </button>
                            
                    </form>
                    <!-- User photo -->
                    @if ($pasien->foto)
                        <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" class="w-10 h-10 rounded-full border-2 border-green-400">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Foto Default" class="w-10 h-10 rounded-full">
                    @endif


                @endauth
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden space-y-2 mt-2 text-lg">
            @guest
                <a href="{{ route('login') }}" class="block hover:text-gray-300">Masuk</a>
            @endguest
            @auth
                <a href="{{ route('beranda') }}" class="block hover:text-gray-300">Dashboard</a>
                <a href="{{ route('jadwal') }}" class="block hover:text-gray-300">Jadwal Dokter</a>
                <a href="{{ route('profil') }}" class="block hover:text-gray-300">Profil</a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left hover:text-gray-300">Keluar</button>
                </form>
            @endauth
        </div>
    </nav>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
