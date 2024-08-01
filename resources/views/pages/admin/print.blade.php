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
            background-color: #004d40;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .section-title {
            background-color: #004d40;
            color: #ffffff;
            padding: 10px;
            border-radius: 8px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #e0f2f1;
            color: #004d40;
        }

        .status-card {
            padding: 15px;
            border-radius: 8px;
            color: #ffffff;
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .status-card-green {
            background-color: #4caf50;
        }

        .status-card-red {
            background-color: #f44336;
        }

        .status-card-yellow {
            background-color: #ffeb3b;
            color: #000;
        }

        .status-card-blue {
            background-color: #2196f3;
        }

        .status-card-gray {
            background-color: #9e9e9e;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body class="p-8">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="header">
            <h1 class="text-3xl font-bold">Rekam Medis Elektronik Lansia</h1>
            <p class="text-sm">WWW.RemelaSehat.com, remelattg61@gmail.com</p>
        </div>

        <div class="p-6">
            <div class="section-title text-xl font-semibold mb-4">Data Klien</div>
            <table>
                <tr>
                    <th>Nama Pasien</th>
                    <td>{{ $record->patient->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>ID Klien (NIK)</th>
                    <td>{{ $record->patient->nik }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $record->patient->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $record->patient->alamat }}</td>
                </tr>
            </table>

            <div class="status-kesehatan mb-6">
                <div class="section-title text-xl font-semibold mb-4">Status Kesehatan Bulan Ini</div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="status-card
                        {{ $statusKolesterol == 'Normal' ? 'status-card-green' : ($statusKolesterol == 'Tinggi' ? 'status-card-red' : 'status-card-blue') }}">
                        Kolesterol: {{ $statusKolesterol }}
                    </div>

                    <div class="status-card
                        {{ $statusIMT == 'Berat badan normal' ? 'status-card-green' : ($statusIMT == 'Kelebihan berat badan' ? 'status-card-red' : 'status-card-yellow') }}">
                        IMT: {{ $statusIMT }}
                    </div>

                    <div class="status-card
                        {{ $statusLingkarPerut == 'Normal' ? 'status-card-green' : ($statusLingkarPerut == 'Tinggi' ? 'status-card-red' : 'status-card-gray') }}">
                        Lingkar Perut: {{ $statusLingkarPerut }}
                    </div>

                    <div class="status-card
                        {{ $statusTekananDarah == 'Normal'
                            ? 'status-card-green'
                            : ($statusTekananDarah == 'Pra-hipertensi'
                                ? 'status-card-yellow'
                                : ($statusTekananDarah == 'Hipertensi tingkat 1'
                                    ? 'status-card-orange'
                                    : ($statusTekananDarah == 'Hipertensi tingkat 2'
                                        ? 'status-card-red'
                                        : ($statusTekananDarah == 'Hipertensi Sistolik Terisolasi'
                                            ? 'status-card-blue'
                                            : 'status-card-gray')))) }}">
                        Tekanan Darah: {{ $statusTekananDarah }}
                    </div>
                </div>
            </div>

            <div class="section-title text-xl font-semibold mb-4">Rekam Medis</div>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>IMT</th>
                        <th>Kolesterol</th>
                        <th>Tekanan Darah</th>
                        <th>Lingkar Perut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patientRecords as $rec)
                    <tr>
                        <td>{{ $rec->record_date->format('d M Y') }}</td>
                        <td>{{ number_format($rec->berat_badan / (($rec->tinggi_badan / 100) * ($rec->tinggi_badan / 100)), 2) }}</td>
                        <td>{{ $rec->kolesterol_total }} mg/dL</td>
                        <td>{{ $rec->tekanan_darah_sistolik }}/{{ $rec->tekanan_darah_diastolik }}</td>
                        <td>{{ $rec->lingkar_perut }} cm</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="section-title text-xl font-semibold mb-4">Informasi Rekam Medis</div>
            <table>
                <tbody>
                    <tr>
                        <th>Tanggal Rekam</th>
                        <td>{{ $record->record_date }}</td>
                    </tr>
                    <tr>
                        <th>Riwayat PTM Keluarga</th>
                        <td>{{ $record->riwayat_ptm_keluarga ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Riwayat PTM Sendiri</th>
                        <td>{{ $record->riwayat_ptm_sendiri ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Merokok</th>
                        <td>{{ $record->merokok ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kurang Aktivitas Fisik</th>
                        <td>{{ $record->kurang_aktivitas_fisik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Berat Badan</th>
                        <td>{{ $record->berat_badan ?? '-' }} kg</td>
                    </tr>
                    <tr>
                        <th>Indeks Massa Tubuh</th>
                        <td>{{ number_format($record->berat_badan / (($record->tinggi_badan / 100) * ($record->tinggi_badan / 100)), 2) }}</td>
                    </tr>

                    <tr>
                        <th>Tinggi Badan</th>
                        <td>{{ $record->tinggi_badan ?? '-' }} cm</td>
                    </tr>
                    <tr>
                        <th>Tekanan Darah</th>
                        <td>{{ $record->tekanan_darah_sistolik ?? '-' }}/{{ $record->tekanan_darah_diastolik ?? '-' }} mmHg</td>
                    </tr>
                    <tr>
                        <th>Gula Darah Sewaktu</th>
                        <td>{{ $record->gula_darah_sewaktu ?? '-' }} mg/dL</td>
                    </tr>
                    <tr>
                        <th>Masalah Kesehatan</th>
                        <td>{{ $record->masalah_kesehatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Obat</th>
                        <td>{{ $record->obat_fasilitas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tindak Lanjut</th>
                        <td>{{ $record->tindak_lanjut ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
