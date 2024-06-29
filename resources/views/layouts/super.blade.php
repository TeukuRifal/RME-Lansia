<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white min-h-screen">
            <div class="py-4 px-6">
                <h1 class="text-3xl font-bold">Super Admin</h1>
                <nav class="mt-6">
                    <ul>
                        <li class="py-2"><a href="{{ route('superadmin.dashboard') }}" class="block hover:bg-gray-700 px-4 py-2">Dashboard</a></li>
                        <li class="py-2"><a href="{{ route('superadmin.superadmins.index') }}" class="block hover:bg-gray-700 px-4 py-2">Manage Admins</a></li>
                        <li class="py-2"><a href="{{ route('superadmin.logs') }}" class="block hover:bg-gray-700 px-4 py-2">Activity Logs</a></li>
                        <li class="py-2">
                            <form action="{{ route('logout') }}" method="POST" class="block hover:bg-gray-700 px-4 py-2">
                                @csrf
                                <button type="submit" class="w-full text-left">Logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
