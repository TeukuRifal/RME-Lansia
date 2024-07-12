<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Animation with Tailwind CSS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="py-2 px-10 font-poppins top-0 shadow-sm m-2 bg-white rounded-md">
        <div class="flex items-center justify-between">
            <div class="navbar-logo justify-between flex items-center">
                <a href="/" class="text-2xl font-inter-italic text-black font-bold flex items-center">
                    <img src="{{ asset('images/logolansia.png') }}" class=" w-20 h-auto mr-2 rounded-full" alt="logo">REMELA
                </a>
            </div>

            @guest
            <div class="hidden md:flex items-center space-x-8 font-semibold text-xl">
                <a href="{{ route('beranda') }}" class="p-2">Beranda</a>
                <a href="{{ route('jadwal') }}" class="p-2">Jadwal</a>
                <a href="{{ route('profile') }}" class="p-2">Profil</a>
                <a href="{{ route('login') }}" class="p-2 hover:bg-lightblue hover:text-white rounded-md">Login</a>
            </div>
            @endguest

            @auth
            <div class="hidden md:flex items-center space-x-8 font-semibold text-2xl">
                <a href="{{ route('pasien.dashboard') }}" class="p-2">Kesehatan</a>
                <div class="relative">
                    <img src="https://cdn-icons-png.flaticon.com/128/2102/2102647.png" alt="Profile" id="profileIcon"
                        class="w-10 h-10 rounded-full cursor-pointer">
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-20">
                        <div class="flex items-center px-4 py-2">
                            <img src="https://cdn-icons-png.flaticon.com/128/2102/2102647.png" alt="Profile"
                                class="w-10 h-10 rounded-full">
                            <div class="ml-3 text-sm">
                                <h2 class="">{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <div class="border-t mt-2"></div>
                        <a href="{{ route('profil') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        <form action="{{ route('logout') }}" method="POST"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            @csrf
                            <button type="submit" class="w-full text-left">Keluar</button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth
        </div>
    </nav>

</body>

</html>
