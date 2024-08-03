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

        th,
        td {
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

        .color-indicator {
            padding: 5px;
            border-radius: 4px;
            display: inline-block;
            color: #fff;
            font-weight: bold;
        }

        .color-indicator-green {
            background-color: #4caf50;
        }

        .color-indicator-red {
            background-color: #f44336;
        }

        .color-indicator-yellow {
            background-color: #ffeb3b;
            color: #000;
        }

        .color-indicator-blue {
            background-color: #2196f3;
        }

        .color-indicator-gray {
            background-color: #9e9e9e;
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
                                    ? 'status-card-red'
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
                        <th>Gula Darah Sewaktu</th>
                        <th>Gula Darah Puasa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patientRecords as $rec)
                        @php
                            $imtColor = ($rec->berat_badan / (($rec->tinggi_badan / 100) * ($rec->tinggi_badan / 100))) < 25 ? 'color-indicator-green' : 'color-indicator-red';
                            $kolesterolColor = $rec->kolesterol_total < 200 ? 'color-indicator-green' : 'color-indicator-red';
                            $tekananDarahColor = ($rec->tekanan_darah_sistolik < 120 && $rec->tekanan_darah_diastolik < 80) ? 'color-indicator-green' : 'color-indicator-red';
                            $lingkarPerutColor = $rec->lingkar_perut < 90 ? 'color-indicator-green' : 'color-indicator-red';
                            $gulaDarahSewaktuColor = $rec->gula_darah_sewaktu < 140 ? 'color-indicator-green' : 'color-indicator-red';
                            $gulaDarahPuasaColor = $rec->gula_darah_puasa < 100 ? 'color-indicator-green' : 'color-indicator-red';
                        @endphp
                        <tr>
                            <td>{{ $rec->record_date->format('d M Y') }}</td>
                            <td class="{{ $imtColor }}">{{ number_format($rec->berat_badan / (($rec->tinggi_badan / 100) * ($rec->tinggi_badan / 100)), 2) }}</td>
                            <td class="{{ $kolesterolColor }}">{{ $rec->kolesterol_total }} mg/dL</td>
                            <td class="{{ $tekananDarahColor }}">{{ $rec->tekanan_darah_sistolik }}/{{ $rec->tekanan_darah_diastolik }}</td>
                            <td class="{{ $lingkarPerutColor }}">{{ $rec->lingkar_perut }} cm</td>
                            <td class="{{ $gulaDarahSewaktuColor }}">{{ $rec->gula_darah_sewaktu }} mg/dL</td>
                            <td class="{{ $gulaDarahPuasaColor }}">{{ $rec->gula_darah_puasa }} mg/dL</td>
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
                        <td>{{ $record->merokok ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                    <tr>
                        <th>Kurang Aktivitas Fisik</th>
                        <td>{{ $record->kurang_aktivitas_fisik ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                    <tr>
                        <th>Kurang Sayur dan Buah</th>
                        <td>{{ $record->kurang_sayur_buah ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                    <tr>
                        <th>Konsumsi Alkohol</th>
                        <td>{{ $record->konsumsi_alkohol ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                    <tr>
                        <th>Masalah Kesehatan</th>
                        <td>{{ $record->masalah_kesehatan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Obat yang Dikonsumsi</th>
                        <td>{{ $record->obat_fasilitas ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tindak Lanjut</th>
                        <td>{{ $record->tindak_lanjut ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Keterangan Indikator Warna</h2>
                <ul class="list-disc pl-5">
                    <li><span class="color-indicator color-indicator-green">Hijau</span>: Kondisi Normal</li>
                    <li><span class="color-indicator color-indicator-red">Merah</span>: Kondisi Abnormal / Perlu Perhatian</li>
                    <li><span class="color-indicator color-indicator-yellow">Kuning</span>: Kondisi Meningkat / Awasi</li>
                    <li><span class="color-indicator color-indicator-blue">Biru</span>: Data Khusus / Perlu Evaluasi</li>
                    <li><span class="color-indicator color-indicator-gray">Abu-abu</span>: Data Tidak Tersedia / Tidak Terukur</li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
