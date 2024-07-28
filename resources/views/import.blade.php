@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Manage Patients</h1>

    <!-- Import and Export Section -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Import and Export Patient Data</h2>

        <!-- Import Form -->
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="file" class="text-gray-700 font-medium">Upload Excel File (.xlsx, .xls)</label>
                <input type="file" name="file" id="file" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition duration-200">Import Data</button>
        </form>

        <!-- Export Button -->
        <div class="mt-6">
            <a href="{{ route('export') }}" class="bg-green-600 text-white py-2 px-4 rounded-lg shadow hover:bg-green-700 transition duration-200">Export Data</a>
        </div>

        <!-- Preview Section -->
        @isset($previewData)
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Preview Imported Data</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg border border-gray-200">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="py-2 px-4">Nama Lengkap</th>
                            <th class="py-2 px-4">NIK</th>
                            <th class="py-2 px-4">Tanggal Lahir</th>
                            <th class="py-2 px-4">Jenis Kelamin</th>
                            <th class="py-2 px-4">Agama</th>
                            <th class="py-2 px-4">Alamat</th>
                            <th class="py-2 px-4">No HP</th>
                            <th class="py-2 px-4">Pendidikan Terakhir</th>
                            <th class="py-2 px-4">Pekerjaan</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Gol Darah</th>
                            <th class="py-2 px-4">Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($previewData as $data)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4">{{ $data['nama_lengkap'] }}</td>
                            <td class="py-2 px-4">{{ $data['nik'] }}</td>
                            <td class="py-2 px-4">{{ $data['tanggal_lahir'] }}</td>
                            <td class="py-2 px-4">{{ $data['jenis_kelamin'] }}</td>
                            <td class="py-2 px-4">{{ $data['agama'] }}</td>
                            <td class="py-2 px-4">{{ $data['alamat'] }}</td>
                            <td class="py-2 px-4">{{ $data['no_hp'] }}</td>
                            <td class="py-2 px-4">{{ $data['pendidikan_terakhir'] }}</td>
                            <td class="py-2 px-4">{{ $data['pekerjaan'] }}</td>
                            <td class="py-2 px-4">{{ $data['status_kawin'] }}</td>
                            <td class="py-2 px-4">{{ $data['gol_darah'] }}</td>
                            <td class="py-2 px-4">{{ $data['email'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endisset
    </div>
</div>
@endsection
