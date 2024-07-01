@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-2xl font-bold mb-6">Pengaturan</h2>
        <!-- Form Pengaturan -->
        <form action="{{ route('updatePengaturan') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="site_name" class="block text-gray-700 font-bold">Nama Situs</label>
                <input type="text" id="site_name" name="site_name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label for="admin_email" class="block text-gray-700 font-bold">Email Admin</label>
                <input type="email" id="admin_email" name="admin_email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
