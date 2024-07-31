<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Logo_Remela.png') }}">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS (optional, untuk komponen interaktif) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

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
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Default sidebar style */
        .sidebar {
            width: 250px;
            transition: width 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #EDFAFD;
            z-index: 40;
            overflow: hidden; /* Ensure no content overflows */
            transition: width 0.3s ease, transform 0.3s ease;
        }

        .sidebar.collapsed {
            width: 100px !important; /* Adjust to the collapsed width */
            transform: translateX(-100%);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative; /* Add relative positioning */
        }

        .sidebar-logo img {
            width: 70px; /* Fixed size of the logo */
            height: 70px; /* Fixed size of the logo */
            transition: width 0.3s ease, height 0.3s ease;
        .sidebar.expanded {
            transform: translateX(0);
        }

        .sidebar.collapsed .sidebar-logo {
            width: 100px; /* Adjust width for collapsed state */
        }

        #collapseIcon, #menuIcon {
            position: absolute; /* Absolute positioning for correct placement */
            top: 1rem;
            right: 1rem;
            cursor: pointer;
        }

        #menuIcon {
            display: none;
        }

        .sidebar.collapsed #collapseIcon {
            display: none;
        }

        .sidebar.collapsed #menuIcon {
            display: block;
        }

        .sidebar .item {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
            justify-content: flex-start;
        }

        .sidebar .item img {
            width: 24px;
            height: 24px;
            transition: width 0.3s ease, height 0.3s ease;
        }

        .sidebar.collapsed .item {
            justify-content: center;
            width: 100%; /* Ensure items adjust to the collapsed sidebar width */
        }

        .sidebar.collapsed .item img {
            width: 24px; /* Ensure icon size remains the same */
            height: 24px;
        }

        .sidebar.collapsed .item-text {
            display: none; /* Hide text when collapsed */
        }

        .sidebar .item:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }

        .sidebar .active {
            background-color: rgba(59, 130, 246, 0.2);
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            transition: margin-left 0.3s ease;
            overflow-y: auto;
            height: 100vh;
        }

        .main-content.collapsed {
            margin-left: 100px; /* Adjust margin to match collapsed sidebar width */
        }

        .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem;
            transition: background-color 0.3s ease, width 0.3s ease;
            background-color: red;
            color: white;
            border: none;
            border-radius: 0.5rem;
        }

        .logout-text {
            display: inline;
        }

        .logout-icon {
            display: none;
            font-size: 1.25rem;
        }

        .sidebar.collapsed .logout-text {
            display: none;
        }

        .sidebar.collapsed .logout-icon {
            display: inline;
        }

        .sidebar.collapsed .logout-button {
            width: 48px;
            justify-content: center;
        }

        .sidebar:not(.collapsed) .logout-button {
            width: 100%;
        }

        /* Responsive Styles */
        @media (max-width: 640px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 40;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            #collapseIcon {
                display: none;
            }

            #menuIcon {
                display: block;
            }

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
<body class="flex bg-gray-50 text-gray-800 font-sans">
    <button id="menuToggle" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

<body class="flex bg-gray-50 text-gray-800 font-montserrat">
    <!-- Overlay for mobile sidebar -->
    <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar min-h-screen flex flex-col bg-#EDFAFD shadow-md border-r border-gray-200">
        <!-- Sidebar Header with Logo and Toggle Button -->
        <div class="relative flex flex-col items-center p-4 border-b border-gray-200">
            <div class="sidebar-logo">
                <img src="{{ asset('images/Logo_Remela.png') }}" alt="Logo" class="rounded-full border-1 border-blue-400">
            </div>
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none" id="collapseIcon" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none hidden" id="menuIcon" onclick="toggleSidebar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
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

        <!-- Sidebar Navigation -->
        <div class="flex flex-col flex-grow overflow-y-auto">
            <div class="p-4">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ asset('images/profilehitam.png') }}" alt="profil" class="w-12 h-12 rounded-full border-2 border-blue-400">
                    @if (Auth::user()->foto)
                        <img src="{{ Storage::url(Auth::user()->foto) }}" alt="Foto Admin"
                            class="w-10 h-10 rounded-full border-2 border-blue-400">
                    @else
                        <img src="{{ asset('images/profilehitam.png') }}" alt="Foto Default"
                            class="w-10 h-10 rounded-full border-2 border-blue-400">
                    @endif
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900 item-text">{{ Auth::user()->name }}</h2>
                        <p class="text-sm text-gray-600 item-text">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <nav class="space-y-4">
                    <div>
                        <p class="font-bold text-sm text-gray-600 mb-4 item-text">Data</p>
                        <a href="{{ route('admin.dashboard') }}" class="item flex items-center space-x-3 hover:bg-blue-100 active:bg-blue-200 p-2 rounded-md">
                            <img src="{{ asset('images/dashboard.png') }}" alt="dashboard" class="w-6 h-6">
                            <span class="item-text font-semibold">Dashboard</span>
                        </a>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-gray-600 mb-4 item-text">Pasien</p>
                        <a href="{{ route('daftarPasien') }}" class="item flex items-center space-x-3 hover:bg-blue-100 active:bg-blue-200 p-2 rounded-md">
                            <img src="{{ asset('images/pasien.png') }}" alt="pasien">
                            <span class="item-text  font-semibold">Pasien</span>
                        </a>
                        <a href="{{ route('rekamMedis') }}" class="item flex items-center space-x-3 hover:bg-blue-100 active:bg-blue-200 p-2 rounded-md">
                            <img src="{{ asset('images/rekammedis.png') }}" alt="rekam medis">
                            <span class="item-text font-semibold">Rekam Medis</span>
                        </a>
                        <a href="{{ route('listJadwal') }}" class="item flex items-center space-x-3 hover:bg-blue-100 active:bg-blue-200 p-2 rounded-md">
                            <img src="{{ asset('images/jadwal.png') }}" alt="jadwal">
                            <span class="item-text font-semibold">Jadwal</span>
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
                    <button type="submit" class="logout-button">
                        <span class="logout-text text-1xl font-semibold">Logout</span>
                        <i class="bi bi-box-arrow-right logout-icon"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow p-6 bg-gray-50 main-content">
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
        document.getElementById('menuToggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('open');
        });

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const collapseIcon = document.querySelector('#collapseIcon');
            const menuIcon = document.querySelector('#menuIcon');

            const overlay = document.getElementById('overlay');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('collapsed');

            // Toggle visibility of icons
            collapseIcon.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
        }
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
