<!-- resources/views/layouts/sidebar.blade.php -->

<div class=" bg-white md:w-64 w-full flex-shrink-0 justify-start m-3 rounded-xl ">
    <div class="p-4 text-2xl font-bold text-center bg-cyan-400 rounded-xl">
        Admin Panel
    </div>
    <div class="p-4 h-screen  font-bold ">
        <ul>
            <li class="py-2 shadow-md my-2 px-4 hover:bg-slate-300 rounded"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="py-2 shadow-md my-2 px-4 hover:bg-slate-300 rounded"><a href="{{ route('tambahPasien') }}">Tambah Data Pasien</a></li>
            <li class="py-2 shadow-md my-2 px-4 hover:bg-slate-300 rounded"><a href="{{ route('daftarPasien') }}">Daftar Pasien</a></li>
            <li class="py-2 shadow-md my-2 px-4 hover:bg-slate-300 rounded"><a href="{{ route('pengaturan') }}">Pengaturan</a></li>
        </ul>
    </div>
</div>
