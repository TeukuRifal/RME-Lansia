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
            color: #0077b6;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .custom-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="border-gray-200 bg-lightblue dark:border-gray-700 px-6 py-3 shadow-md">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('beranda') }}" class="text-3xl font-bold flex items-center">
                    <img src="{{ asset('images/LansiaLogoFix.png') }}" class="w-16 h-16 mr-4 font-roboto rounded-full" alt="logo">
                    REMELA
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-6 text-lg font-semibold">
                @guest
                <a href="{{ route('login') }}" class="bg-cyan-500 hover:bg-cyan-700 hover:text-white text-white py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Masuk
                </a>
                @endguest
                @auth
                <a href="{{ route('beranda') }}" class="hover-text hover:border-b-2 hover:border-black hover:pb-1">Dashboard</a>
                <a href="{{ route('edukasi') }}" class="hover-text hover:border-b-2 hover:pb-1 hover:border-black">Edukasi</a>
                <a href="{{ route('jadwal') }}" class="hover-text hover:border-b-2 hover:pb-1 hover:border-black">Jadwal</a>
                <a href="{{ route('profil') }}" class="hover-text hover:border-b-2 hover:pb-1 hover:border-black">Profil</a>
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="hover-text hover:border-b-2 hover:pb-1 hover:border-black">
                        <span class="logout-text text-lg font-semibold">Keluar</span>
                        <i class="hover-text bi bi-box-arrow-right logout-icon"></i>
                    </button>
                </form>
                @endauth
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden space-y-2 mt-4 text-lg">
            @guest
            <a href="{{ route('login') }}" class="block bg-cyan-500 text-white py-2 px-4 rounded-lg hover:bg-cyan-700 transition duration-300">Masuk</a>
            @endguest
            @auth
            <a href="{{ route('beranda') }}" class="block py-2 hover:bg-gray-200 rounded-lg">Dashboard</a>
            <a href="{{ route('edukasi') }}" class="block py-2 hover:bg-gray-200 rounded-lg">Edukasi</a>
            <a href="{{ route('jadwal') }}" class="block py-2 hover:bg-gray-200 rounded-lg">Jadwal</a>
            <a href="{{ route('profil') }}" class="block py-2 hover:bg-gray-200 rounded-lg">Profil</a>
            <form action="{{ route('logout') }}" method="POST" class="block">
                @csrf
                <button type="submit" class="w-full text-left py-2 hover:bg-gray-200 rounded-lg">Keluar</button>
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
