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
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        .sidebar.collapsed {
            width: 16rem;
        }

        .sidebar.expanded {
            width: 24rem;
        }

        .submenu {
            display: none;
        }

        .sidebar .item:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }

        .sidebar .active {
            background-color: rgba(59, 130, 246, 0.2);
        }
    </style>
</head>

<body class="flex bg-gray-50 text-gray-800 font-sans">

    <!-- Sidebar -->
    <div class="sidebar min-h-screen flex flex-col bg-white shadow-md border-r border-gray-200">
        <div class="p-4 border-b border-gray-200 flex items-center justify-between">
            <div class="text-center font-bold text-xl text-gray-800">Admin Panel</div>
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col flex-grow overflow-y-auto">
            <div class="p-4">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ asset('images/profilehitam.png') }}" alt="profil" class="w-12 h-12 rounded-full border-2 border-blue-400">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">{{ Auth::user()->name }}</h2>
                        <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <nav class="space-y-4">
                    <div>
                        <p class="font-bold text-sm text-gray-600 mb-2">Data</p>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center space-x-3 p-2 rounded-lg transition-colors duration-300 ease-in-out item hover:bg-blue-100 active:bg-blue-200">
                            <img src="{{ asset('images/dashboard.png') }}" alt="dashboard" class="w-6 h-6">
                            <span>Dashboard</span>
                        </a>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-600 mb-2">Pasien</p>
                        <a href="{{ route('daftarPasien') }}"
                            class="flex items-center space-x-3 p-2 rounded-lg transition-colors duration-300 ease-in-out item hover:bg-blue-100 active:bg-blue-200">
                            <img src="{{ asset('images/pasien.png') }}" alt="pasien" class="w-6 h-6">
                            <span>Pasien</span>
                        </a>
                        <a href="{{ route('rekamMedis') }}"
                            class="flex items-center space-x-3 p-2 rounded-lg transition-colors duration-300 ease-in-out item hover:bg-blue-100 active:bg-blue-200">
                            <img src="{{ asset('images/rekammedis.png') }}" alt="rekam medis" class="w-6 h-6">
                            <span>Rekam Medis</span>
                        </a>
                        <a href="{{ route('listJadwal') }}"
                            class="flex items-center space-x-3 p-2 rounded-lg transition-colors duration-300 ease-in-out item hover:bg-blue-100 active:bg-blue-200">
                            <img src="{{ asset('images/jadwal.png') }}" alt="jadwal" class="w-6 h-6">
                            <span>Jadwal</span>
                        </a>
                        {{-- <a href="#" class="flex items-center space-x-3 p-2 rounded-lg transition-colors duration-300 ease-in-out item hover:bg-blue-100 active:bg-blue-200">
                            <img src="{{ asset('images/addData.png') }}" alt="profil admin" class="w-6 h-6">
                            <span>Profil Admin</span>
                        </a> --}}
                    </div>
                </nav>
            </div>
            <div class="p-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition duration-300 ease-in-out">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow p-6 bg-gray-50">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('expanded');
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.submenu').style.display = 'none';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
