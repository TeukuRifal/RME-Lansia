<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        .sidebar {
            width: 240px;
            transition: width 0.3s ease;
        }

        .sidebar-collapsed {
            width: 64px;
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

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
        }

        .sidebar-nav {
            flex-grow: 1;
        }

        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
        }

        .sidebar-nav a:hover {
            background-color: #4A5568;
        }

        .sidebar-nav a svg {
            margin-right: 0.5rem;
            transition: margin-right 0.3s ease;
        }

        .sidebar-collapsed .sidebar-nav a {
            padding: 0.75rem;
            justify-content: center;
        }

        .sidebar-collapsed .sidebar-nav a svg {
            margin-right: 0;
        }

        .sidebar-collapsed .sidebar-nav a span {
            display: none;
        }

        .sidebar-collapsed .logout {
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 64px;
            }

            .sidebar-logo img {
                max-width: 50%;
            }

            .sidebar-header .header {
                opacity: 0;
                display: none;
            }

            .sidebar-nav a {
                padding: 0.75rem;
                justify-content: center;
            }

            .sidebar-nav a svg {
                margin-right: 0;
            }

            .sidebar-nav a span {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <div class="sidebar bg-gray-800 text-white min-h-screen flex flex-col">
        <div class="sidebar-header">
            <div class="header text-xl font-bold text-center text-white">
                <p class="py-2">Admin Panel</p>
                <hr class="h-px bg-white border-0">
                <div class="flex items-center p-2">
                    <img src="{{ asset('images/profileputih.png') }}" alt="profil" class="w-10 h-10 rounded-full">
                    <div class="ml-3 text-sm">
                        <h2>{{ Auth::user()->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        <nav class="flex-grow sidebar-nav">
            <p class="font-bold size-5 m-2">Data</p>
            <a href="{{ route('admin.dashboard') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                </svg>
                <span>Dashboard</span>
            </a>
            <p class="font-bold size-5 m-2">Pasien</p>
            <a href="{{ route('daftarPasien') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span>Kelola Pasien</span>
            </a>
            <a href="{{ route('rekamMedis') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span>Rekam Medis</span>
            </a>
            <a href="{{ route('jadwal') }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <span>Jadwal</span>
            </a>
            <a href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Log Aktivitas</span>
            </a>
            <a href="#">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h8"></path>
                </svg>
                <span>Profil Admin</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-grow p-6">
        @yield('content')
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            var sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('sidebar-collapsed');
        });
    </script>
</body>

</html>
