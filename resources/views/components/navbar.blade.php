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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap"
        rel="stylesheet">
    <style>
        .hover-text:hover {
            color: #0077b6;
        }

        body {
            margin: 0;
            padding: 0;
        }

        /* Custom shadow to ensure visibility */
        .custom-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Adjust as needed */
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="border-gray-200 bg-lightblue  dark:border-gray-700 px-6 shadow-md">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('beranda') }}" class="text-3xl font-bold flex items-center">
                    <img src="{{ asset('images/LansiaLogoFix.png') }}" class="w-24 h-auto mr-4 font-roboto rounded-full"
                        alt="logo">
                    REMELA
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex items-center space-x-8 text-xl font-bold ">
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-cyan-100 hover:bg-cyan-600 hover:text-white focus:ring-4 focus:ring-cyan-300 text-black text-2xl font-semibold py-3 px-6 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Masuk
                    </a>

                @endguest
                @auth
                    <a href="{{ route('beranda') }}"
                        class="hover-text hover:border-b-2 hover:border-black hover:pb-3 hover:scale-110">Dashboard</a>
                    <a href="{{ route('jadwal') }}"
                        class="hover-text hover:border-b-2 hover:pb-3 hover:border-black">Jadwal</a>
                    <a href="{{ route('profil') }}"
                        class="hover-text hover:border-b-2 hover:pb-3 hover:border-black">Profil</a>
                    {{-- <a href="{{ route('pasien') }}" class="hover-text hover:border-b-2 hover:border-gray-400">Data Pasien</a> --}}
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="hover-text hover:border-b-2 hover:pb-3 hover:border-black">
                            <span class="logout-text text-xl font-semibold"></span>
                            <i class="hover-text mr-10 bi bi-box-arrow-right logout-icon"></i>
                        </button>
                    </form>
                @endauth
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden space-y-2 mt-2 text-lg">
            @guest
                <a href="{{ route('login') }}"
                    class="block hover:text-gray-300 transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">Masuk</a>
            @endguest
            @auth
                <a href="{{ route('beranda') }}" class="hover-text hover:border-b-2 hover:border-black">Dashboard</a>
                <a href="{{ route('jadwal') }}" class="hover-text hover:border-b-2 hover:border-black">Jadwal Dokter</a>
                <a href="{{ route('profil') }}" class="hover-text hover:border-b-2 hover:border-black">Profil</a>
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
