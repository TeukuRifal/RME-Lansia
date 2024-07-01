@extends('layouts.super')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Manage Superadmins</h1>
    <div class="tambahadm flex items-center p-4">
        <a href="{{ route('superadmin.superadmins.create') }}" class="flex items-center bg-blue-500 text-white py-2 px-4 rounded">
            <img src="{{ asset('images/AddAdmin.png') }}" alt="add" class="w-5 h-5 mr-2">
            Tambah Akun
        </a>
    </div>
    <table id="patientsTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Role</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($superadmins as $superadmin)
            
            <tr>
                <td class="py-2 px-4">{{ $superadmin->name }}</td>
                <td class="py-2 px-4">{{ $superadmin->email }}</td>
                <td class="py-2 px-4">{{ $superadmin->role }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('superadmin.superadmins.edit', $superadmin->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                    <form action="{{ route('superadmin.superadmins.destroy', $superadmin->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
