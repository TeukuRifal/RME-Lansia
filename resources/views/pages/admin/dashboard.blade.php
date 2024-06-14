<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <div>
            <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Dashboard cards -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Total Pasien</h2>
            <p class="mt-4 text-3xl">150</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Pasien Baru</h2>
            <p class="mt-4 text-3xl">10</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Pasien Sembuh</h2>
            <p class="mt-4 text-3xl">120</p>
        </div>
    </div>
@endsection
