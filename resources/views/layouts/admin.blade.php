<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        .sidebar {
            transition: width 0.3s ease;
        }

        .submenu {
            display: none;
        }
    </style>
</head>

<body class="flex">

    <!-- Sidebar -->
    <div class="sidebar min-h-screen flex flex-col  w-64">
        <div class="p-4 border-b border-gray-700">
            <div class="text-center font-bold text-xl mb-2">Admin Panel</div>
            <div class="flex items-center">
                <img src="{{ asset('images/profilehitam.png') }}" alt="profil" class="w-10 h-10 rounded-full">
                <div class="ml-3">
                    <h2>{{ Auth::user()->name }}</h2>
                </div>
            </div>
        </div>
        <nav class="flex-grow p-4">
            <div class="space-y-4">
                <div>
                    <p class="font-bold text-sm mb-2">Data</p>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center space-x-2 hover:bg-blue-200 p-2 rounded-lg">
                        <img src="{{ asset('images/dashboard.png') }}" alt="dashboard" class="w-6 h-6">
                        <span>Dashboard</span>
                    </a>
                </div>
                <div>
                    <p class="font-bold text-sm mb-2">Pasien</p>
                    <a href="{{ route('daftarPasien') }}"
                        class="flex items-center space-x-2 hover:bg-blue-200 p-2 rounded-lg">
                        <img src="{{ asset('images/pasien.png') }}" alt="pasien" class="w-6 h-6">
                        <span>Pasien</span>
                    </a>
                    <a href="{{ route('rekamMedis')}}"
                        class="flex items-center space-x-2 hover:bg-blue-200 p-2 rounded-lg">
                        <img src="{{ asset('images/rekammedis.png') }}" alt="profil" class="w-6 h-6 ">
                        <span>Rekam Medis</span>
                    </a>
                    <a href="{{ route('listJadwal') }}"
                        class="flex items-center space-x-2 hover:bg-blue-200 p-2 rounded-lg">
                        <img src="{{ asset('images/jadwal.png') }}" alt="jadwal" class="w-6 h-6">
                        <span>Jadwal</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 hover:bg-blue-200 p-2 rounded-lg">
                        <img src="{{ asset('images/addData.png') }}" alt="profil admin" class="w-6 h-6">
                        <span>Profil Admin</span>
                    </a>
                </div>
            </div>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow p-6 bg-gray-100">
        @yield('content')
    </div>

    <script>
        function toggleMenu() {
            const submenu = document.querySelector('.submenu');
            submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.submenu').style.display = 'none';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
