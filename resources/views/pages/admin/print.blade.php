<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            .print\:hidden {
                display: none;
            }
        }

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
        }

        .header {
            background-color: #00695c;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
        }

        .section-title {
            background-color: #004d40;
            color: #ffffff;
            padding: 10px;
            border-radius: 8px;
        }

        th {
            width: 40%;
            text-align: left;
            background-color: #e0f2f1;
        }

        td {
            width: 60%;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }
    </style>
</head>

<body class="p-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="header text-center">
            <h1 class="text-3xl font-bold">Rekam Medis Elektronik Lansia</h1>
            <p class="text-sm">WWW.RemelaSehat.com, remelattg61@gmail.com</p>
        </div>

        <div class="p-6">
            <div class="section-title text-xl font-semibold mb-4">Data Klien</div>
            <table class="w-full mb-6">
                <tr>
                    <th class="px-4 py-2">Nama Pasien</th>
                    <td class="px-4 py-2">{{ $record->patient->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">ID Klien (NIK)</th>
                    <td class="px-4 py-2">{{ $record->patient->nik }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Tanggal Lahir</th>
                    <td class="px-4 py-2">{{ $record->patient->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th class="px-4 py-2">Alamat</th>
                    <td class="px-4 py-2">{{ $record->patient->alamat }}</td>
                </tr>
            </table>

            <div class="status-kesehatan mb-6">
                <div class="section-title text-xl font-semibold mb-4">Status Kesehatan Bulan Ini</div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                        {{ $statusKolesterol == 'Normal' ? 'bg-green-200' : ($statusKolesterol == 'Tinggi' ? 'bg-red-200' : 'bg-blue-200') }}">
                        <h2 class="text-lg font-bold mb-2">Kolesterol</h2>
                        <p class="text-xl">{{ $statusKolesterol }}</p>
                    </div>

                    <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                        {{ $statusIMT == 'Berat badan normal' ? 'bg-green-200' : ($statusIMT == 'Kelebihan berat badan' ? 'bg-red-200' : 'bg-yellow-200') }}">
                        <h2 class="text-lg font-bold mb-2">Indeks Massa Tubuh (IMT)</h2>
                        <p class="text-xl">{{ $statusIMT }}</p>
                    </div>

                    <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                        {{ $statusLingkarPerut == 'Normal' ? 'bg-green-100' : ($statusLingkarPerut == 'Tinggi' ? 'bg-red-100' : 'bg-white') }}">
                        <h2 class="text-lg font-bold mb-2">Lingkar Perut</h2>
                        <p class="text-xl">{{ $statusLingkarPerut }}</p>
                    </div>

                    <div class="p-4 rounded-lg shadow-md flex flex-col items-center justify-center
                        {{ $statusTekananDarah == 'Normal'
                            ? 'bg-green-200'
                            : ($statusTekananDarah == 'Pra-hipertensi'
                                ? 'bg-yellow-200'
                                : ($statusTekananDarah == 'Hipertensi tingkat 1'
                                    ? 'bg-orange-200'
                                    : ($statusTekananDarah == 'Hipertensi tingkat 2'
                                        ? 'bg-red-200'
                                        : ($statusTekananDarah == 'Hipertensi Sistolik Terisolasi'
                                            ? 'bg-blue-200'
                                            : 'bg-gray-200')))) }}">
                        <h2 class="text-lg font-bold mb-2">Tekanan Darah</h2>
                        <p class="text-xl">{{ $statusTekananDarah }}</p>
                    </div>
                </div>
            </div>

            <div class="section-title text-xl font-semibold mb-4">Rekam Medis</div>
            <table class="w-full mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">IMT</th>
                        <th class="px-4 py-2">Kolesterol</th>
                        <th class="px-4 py-2">Tekanan Darah</th>
                        <th class="px-4 py-2">Lingkar Perut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patientRecords as $rec)
                    <tr>
                        <td class="px-4 py-2">{{ $rec->record_date->format('d M Y') }}</td>
                        <td class="px-4 py-2">
                            {{ number_format($rec->berat_badan / (($rec->tinggi_badan / 100) * ($rec->tinggi_badan / 100)), 2) }}
                        </td>
                        <td class="px-4 py-2">{{ $rec->kolesterol_total }} mg/dL</td>
                        <td class="px-4 py-2">{{ $rec->tekanan_darah_sistolik }}/{{ $rec->tekanan_darah_diastolik }}</td>
                        <td class="px-4 py-2">{{ $rec->lingkar_perut }} cm</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="section-title text-xl font-semibold mb-4">Informasi Rekam Medis</div>
            <table class="w-full">
                <tbody>
                    <tr>
                        <th class="px-4 py-2 text-left">Tanggal Rekam</th>
                        <td class="px-4 py-2">{{ $record->record_date }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Riwayat PTM Keluarga</th>
                        <td class="px-4 py-2">{{ $record->riwayat_ptm_keluarga ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Riwayat PTM Sendiri</th>
                        <td class="px-4 py-2">{{ $record->riwayat_ptm_sendiri ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Merokok</th>
                        <td class="px-4 py-2">{{ $record->merokok ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Kurang Aktivitas Fisik</th>
                        <td class="px-4 py-2">{{ $record->kurang_aktivitas_fisik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Berat Badan</th>
                        <td class="px-4 py-2">{{ $record->berat_badan ?? '-' }} kg</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Tinggi Badan</th>
                        <td class="px-4 py-2">{{ $record->tinggi_badan ?? '-' }} cm</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Tekanan Darah</th>
                        <td class="px-4 py-2">{{ $record->tekanan_darah_sistolik ?? '-' }}/{{ $record->tekanan_darah_diastolik ?? '-' }} mmHg</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Gula Darah Sewaktu</th>
                        <td class="px-4 py-2">{{ $record->gula_darah_sewaktu ?? '-' }} mg/dL</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Masalah Kesehatan</th>
                        <td class="px-4 py-2">{{ $record->masalah_kesehatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Obat Fasilitas</th>
                        <td class="px-4 py-2">{{ $record->obat_fasilitas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-2 text-left">Tindak Lanjut</th>
                        <td class="px-4 py-2">{{ $record->tindak_lanjut ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="text-center mt-8">
        <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow-md">Cetak</button>
        <a href="{{ url()->previous() }}" class="ml-4 bg-gray-500 text-white px-4 py-2 rounded shadow-md">Kembali</a>
    </div> --}}
</body>

</html>
