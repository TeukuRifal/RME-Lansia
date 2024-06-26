<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kesehatan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Data Kesehatan</h2>
            <div class="mb-4">
                <p><strong>Nama:</strong> {{ auth()->user()->nama_lengkap }}</p>
                <p><strong>NIK:</strong> {{ auth()->user()->nik }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ auth()->user()->tanggal_lahir->format('d M Y') }}</p>
                <!-- Tambahkan data kesehatan pasien sesuai kebutuhan -->
            </div>
            <div class="flex items-center justify-between">
                <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
