<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-white md:w-64 w-full flex-shrink-0 h-screen justify-start m-3 rounded-xl shadow-lg ">
    <div class="p-4 text-2xl font-bold text-center bg-cyan-400 text-white rounded-t-xl">
        Admin Panel
    </div>
    <div class="p-4 font-bold">
        <ul class="space-y-2">
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('dashboard') }}" class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Dashboard
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('tambahPasien') }}" class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Tambah Data Pasien
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('daftarPasien') }}" class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Daftar Pasien
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <a href="{{ route('pengaturan') }}" class="block transition duration-300 ease-in-out hover:text-cyan-400">
                    Pengaturan
                </a>
            </li>
            <li class="py-2 px-4 hover:bg-gray-100 rounded">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left hover:bg-red-500 hover:text-white py-2 px-4 rounded transition duration-300 ease-in-out">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
