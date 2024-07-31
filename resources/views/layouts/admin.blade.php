<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS (optional, untuk komponen interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        .sidebar {
            width: 240px;
            /* Lebar sidebar saat belum dilipat */
            transition: width 0.3s ease;
        }

        .sidebar-collapsed {
            width: 64px;
            /* Lebar sidebar saat dilipat */
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .sidebar-logo img {
            max-width: 100%;
            height: auto;
            transition: max-width 0.3s ease;
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
    <div class="sidebar bg-gray-800 text-white min-h-screen flex flex-col">
        <div class="sidebar-header">
            <div class="header text-xl font-bold text-center text-white rounded-t-xl">
                <p class="py-2">Admin Panel</p>
                <hr class="h-px bg-white border-0 dark:bg-gray-700">
                <div class="flex items-center p-2">
                    <img src="{{ asset('images/profileputih.png') }}" alt="Profile" class="w-10 h-10 rounded-full">
                    <div class="ml-3 text-sm">
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
            </div>
            <button id="toggleSidebar" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
        <nav class="flex-grow sidebar-nav">
            <p class="font-bold size-5 m-2">Data</p>
            <a href="{{ route('admin.dashboard') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>
            <p class="font-bold size-5 m-2">Pasien</p>
            <a href="{{ route('daftarPasien') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H4m8 4H4m8-8H4m8 8h4m0 4h4m0-16h4"></path>
                </svg>
                <span>Kelola Pasien</span>
            </a>
            <a href="{{ route('rekamMedis') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H4m8 4H4m8-8H4m8 8h4m0 4h4m0-16h4"></path>
                </svg>
                <span>Rekam Medis</span>
            </a>
            <a href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-2.21 0-4 .9-4 2s1.79 2 4 2 4-.9 4-2-1.79-2-4-2z"></path>
                </svg>
                <span>Log Aktivitas</span>
            </a>
            <a href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v4m0 4v4m0 4v4">
                    </path>
                </svg>
                <span>Profil Admin</span>
            </a>
        </nav>
        <div class="logout p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Logout</button>
            </form>
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
