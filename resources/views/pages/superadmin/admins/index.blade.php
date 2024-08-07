<!-- resources/views/pages/superadmin/admins/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Daftar Pengguna</h1>

        <a href="{{ route('superadmin.superadmins.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block"><i class="bi bi-person-plus"></i>Tambah
            Pengguna</a>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="py-3 px-4 border-b">Nama</th>
                        <th class="py-3 px-4 border-b">Email</th>
                        <th class="py-3 px-4 border-b">Peran</th>
                        <th class="py-3 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($superadmins as $superadmin)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $superadmin->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $superadmin->email }}</td>
                            <td class="py-3 px-4 border-b">{{ ucfirst($superadmin->role) }}</td>
                            <td class="py-3 px-4 border-b flex space-x-2">
                                <a href="{{ route('superadmin.superadmins.edit', $superadmin->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded flex items-center space-x-1">
                                    <i class="bi bi-pencil"></i>
                                    <span>Edit</span>
                                </a>
                                <form action="{{ route('superadmin.superadmins.destroy', $superadmin->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded flex items-center space-x-1">
                                        <i class="bi bi-trash"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
