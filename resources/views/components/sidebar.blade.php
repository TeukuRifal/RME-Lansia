<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-blue-900 md:w-64 w-full flex-shrink-0">
    <div class="p-4 text-white text-2xl font-bold text-center bg-blue-700">
        Admin Panel
    </div>
    <div class="p-4 h-screen text-white">
        <ul>
            <li class="py-2 px-4 hover:bg-blue-700 rounded"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="py-2 px-4 hover:bg-blue-700 rounded"><a href="{{ route('tambahPasien') }}">Tambah Data Pasien</a></li>
            <li class="py-2 px-4 hover:bg-blue-700 rounded"><a href="{{ route('daftarPasien') }}">Daftar Pasien</a></li>
            <li class="py-2 px-4 hover:bg-blue-700 rounded"><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
        </ul>
    </div>
</div>
