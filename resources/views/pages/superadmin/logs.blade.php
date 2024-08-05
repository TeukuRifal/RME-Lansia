<!-- resources/views/pages/superadmin/logs.blade.php -->
@extends('layouts.super')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Aktivitas Sistem</h1>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="py-3 px-4 border-b">Waktu</th>
                    <th class="py-3 px-4 border-b">Aksi</th>
                    <th class="py-3 px-4 border-b">Pengguna</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td class="py-3 px-4 border-b">{{ $log->created_at }}</td>
                    <td class="py-3 px-4 border-b">{{ $log->description }}</td>
                    <td class="py-3 px-4 border-b">{{ $log->user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
