@extends('layouts.main')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-center text-3xl font-bold mb-6">Tambah Jadwal Cek Kesehatan</h2>
        <div class="bg-blue-50 p-6 rounded-xl shadow-lg mx-auto max-w-md">
            <form action="{{ route('simpanJadwal') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_tempat" class="block text-sm font-medium text-gray-700">Nama Tempat</label>
                    <input type="text" name="nama_tempat" id="nama_tempat" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
                </div>
                <div class="mb-4">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
                </div>
                <div class="mb-4">
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                    <input type="time" name="waktu_mulai" id="waktu_mulai" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
                </div>
                <div class="mb-4">
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                    <input type="time" name="waktu_selesai" id="waktu_selesai" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
                </div>
                <div class="mb-4">
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white font-semibold py-2 px-4 rounded-full bg-blue-500 hover:bg-blue-600 transition duration-300 ease-in-out">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
