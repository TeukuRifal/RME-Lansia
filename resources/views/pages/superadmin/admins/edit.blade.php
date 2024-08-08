@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Edit Admin</h1>
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('superadmin.superadmins.update', $superadmin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                    <input type="text"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:outline-none"
                        id="name" name="name" value="{{ $superadmin->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:outline-none"
                        id="email" name="email" value="{{ $superadmin->email }}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password (kosongkan jika
                        tidak ingin mengubah)</label>
                    <input type="password"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:outline-none"
                        id="password" name="password">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Konfirmasi
                        Password</label>
                    <input type="password"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:border-blue-500 focus:outline-none"
                        id="password_confirmation" name="password_confirmation">
                </div>

                <div class="flex justify-end gap-1 ">
                    <a href="{{ route('superadmin.superadmins.index') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <i class="bi bi-arrow-left mr-2"></i> Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Simpan</button>
                </div>

            </form>
        </div>
    </div>
@endsection
