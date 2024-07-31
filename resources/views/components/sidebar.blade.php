<!-- components/sidebar.blade.php -->
<div id="sidebar"
    class="bg-white md:w-64 w-full flex-shrink-0 h-screen justify-start rounded-xl shadow-md transition-transform duration-300 ease-in-out transform -translate-x-full md:translate-x-0">
    <div class="p-2 text-xl font-bold text-center bg-blue-950 text-white rounded-t-xl">
        <p class="py-2">Admin Panel</p>
        <hr class="h-px bg-white border-0 dark:bg-gray-700">
        <div class="flex items-center p-2">
            <img src="{{ asset('images/profileputih.png') }}" alt="profil" class="w-10 h-10 rounded-full">
            <div class="ml-3 text-sm">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
    </div>
    <div class="p-4 font-bold">
        <ul class="space-y-2">
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('admin.dashboard') }}"
                    class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Dashboard
                </a>
            </li>
            {{-- <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('tambahPasien') }}" class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Tambah Data Pasien
                </a>
            </li> --}}
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('daftarPasien') }}"
                    class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Daftar Pasien
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('updatePengaturan') }}"
                    class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Pengaturan
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left hover:bg-red-500 hover:text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- components/sidebar.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');

        toggleSidebarBtn.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>
