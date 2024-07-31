@extends('layouts.super')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Activity Logs</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Log</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($logs as $log)
                <tr>
                    <td class="py-3 px-4">{{ $log->description }}</td>
                    <td class="py-3 px-4">{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
                    <td class="py-3 px-4">{{ $log->causer ? $log->causer->name : 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
