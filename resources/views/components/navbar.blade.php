<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap"
        rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen p-2">

    <!-- Navbar -->
    <nav class="py-4 px-6 shadow-md">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('beranda') }}" class="text-2xl font-bold flex items-center">
                    <img src="{{ asset('images/LansiaLogoFix.png') }}" class="w-16 h-auto mr-3 font-roboto rounded-full"
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

            <div class="hidden md:flex items-center space-x-6 text-lg">
                @guest
                    <a href="{{ route('login') }}" class="hover:text-gray-300">Masuk</a>
                @endguest

                @auth
                    <a href="{{ route('beranda') }}" class="hover:text-gray-300">Dashboard</a>
                    <a href="{{ route('jadwal') }}" class="hover:text-gray-300">Jadwal </a>
                    <a href="{{ route('profil') }}" class="hover:text-gray-300">Profil</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="hover:text-gray-300">Keluar</button>
                    </form>
                    <!-- User photo -->
                    @if ($pasien->foto)
                        <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" class="w-10 h-10 rounded-full">
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
