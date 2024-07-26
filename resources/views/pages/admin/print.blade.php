<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            .print\:hidden { display: none; }
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg">
        <div class="p-6 border-b border-gray-200 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Rekam Medis Rumah Sakit</h1>
            <p class="text-gray-600">Alamat Rumah Sakit, Telepon, Email</p>
            <hr class="my-4 border-t-2 border-gray-300">
        </div>

        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Data Pasien</h2>
            <table class="w-full mb-6">
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Nama Pasien</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->patient->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">ID Pasien (NIK)</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->patient->nik }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Tanggal Lahir</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->patient->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Alamat</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->patient->alamat }}</td>
                </tr>
            </table>

            <h2 class="text-xl font-semibold text-gray-700 mb-4">Rekam Medis</h2>
            <table class="w-full">
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Tanggal Rekam</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->record_date }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Riwayat PTM Keluarga</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->riwayat_ptm_keluarga ?? '-' }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Riwayat PTM Sendiri</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->riwayat_ptm_sendiri ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Merokok</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->merokok ?? '-' }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Kurang Aktivitas Fisik</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->kurang_aktivitas_fisik ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Berat Badan</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->berat_badan ?? '-' }} kg</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Tinggi Badan</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->tinggi_badan ?? '-' }} cm</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Tekanan Darah</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->tekanan_darah ?? '-' }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Gula Darah Sewaktu</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->gula_darah_sewaktu ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Kolesterol Total</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->kolesterol_total ?? '-' }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-gray-600">Masalah Kesehatan</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->masalah_kesehatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">Tindak Lanjut</th>
                    <td class="px-4 py-2 text-gray-700">{{ $record->tindak_lanjut ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <div class="p-6 border-t border-gray-200 text-center">
            <p class="text-gray-500">Dokumen ini dicetak dari sistem informasi rumah sakit.</p>
            <button onclick="window.print()" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg print:hidden">
                Cetak Halaman
            </button>
        </div>
    </div>
</body>
</html>
