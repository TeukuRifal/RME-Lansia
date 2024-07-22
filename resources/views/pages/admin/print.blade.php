<!-- resources/views/import.blade.php -->

@extends('layouts.admin')

@section('title', 'Impor dan Ekspor Data Pasien')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Impor dan Ekspor Data Pasien</h2>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulir Impor -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 mb-6">
        <h3 class="text-xl font-semibold mb-4">Impor Data Pasien</h3>
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="file" class="block text-gray-700">Pilih file Excel (.xlsx, .xls)</label>
                <input type="file" name="file" id="file" class="mt-1 block w-full" required>
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">Impor Data</button>
        </form>
    </div>

    <!-- Tombol Ekspor -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
        <h3 class="text-xl font-semibold mb-4">Ekspor Data Pasien</h3>
        <a href="{{ route('export') }}" class="bg-green-500 text-white py-2 px-4 rounded shadow hover:bg-green-600 transition duration-200">Ekspor ke Excel</a>
    </div>
</div>
@endsection
