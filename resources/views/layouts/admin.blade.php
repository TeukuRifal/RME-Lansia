<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS (optional, untuk komponen interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Teko:wght@300..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        .sidebar {
            transition: width 0.3s ease, transform 0.3s ease;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar.expanded {
            transform: translateX(0);
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

        /* Media query for mobile view */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 50;
                height: 100%;
                width: 16rem;
                transform: translateX(-100%);
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }

            .overlay.visible {
                display: block;
            }
        }
    </style>
</head>

<body class="flex bg-gray-50 text-gray-800 font-montserrat">
    <!-- Overlay for mobile sidebar -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar min-h-screen flex flex-col bg-white shadow-md border-r border-gray-200">
        <div class="p-4 border-b border-gray-200 flex items-center justify-between">
            <div class="text-center font-bold text-xl text-gray-800">Admin Panel</div>
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none md:hidden" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
        <div class="flex flex-col flex-grow overflow-y-auto">
            <div class="p-4">
                <div class="flex items-center space-x-3 mb-4">
                    @if (Auth::user()->foto)
                        <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Foto Admin"
                            class="w-10 h-10 rounded-full border-2 border-blue-400">
                    @else
                        <img src="{{ asset('images/profilehitam.png') }}" alt="Foto Default"
                            class="w-10 h-10 rounded-full border-2 border-blue-400">
                    @endif
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
        <button class="text-gray-600 hover:text-gray-800 focus:outline-none md:hidden mb-4" onclick="toggleSidebar()">
            <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                </path>
            </svg>
        </button>
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('collapsed');
            sidebar.classList.toggle('expanded');
            overlay.classList.toggle('visible');
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.submenu').style.display = 'none';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
