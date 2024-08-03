<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        @media print {
            .print\:hidden {
                display: none;
            }

            .button {
                display: none; /* Hide all buttons during printing */
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

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 8px;
            color: #ffffff;
            background-color: #004d40;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #003d33;
        }

        .button-print {
            background-color: #4caf50;
        }

        .button-print:hover {
            background-color: #388e3c;
        }

        .button-back {
            background-color: #f44336;
        }

        .button-back:hover {
            background-color: #c62828;
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
                    <div
                        class="status-card
                        {{ $statusKolesterol == 'Normal' ? 'status-card-green' : ($statusKolesterol == 'Tinggi' ? 'status-card-red' : 'status-card-blue') }}">
                        Kolesterol: {{ $statusKolesterol }}
                    </div>

                    <div
                        class="status-card
                        {{ $statusIMT == 'Berat badan normal' ? 'status-card-green' : ($statusIMT == 'Kelebihan berat badan' ? 'status-card-red' : 'status-card-yellow') }}">
                        IMT: {{ $statusIMT }}
                    </div>

                    <div
                        class="status-card
                        {{ $statusLingkarPerut == 'Normal' ? 'status-card-green' : ($statusLingkarPerut == 'Tinggi' ? 'status-card-red' : 'status-card-gray') }}">
                        Lingkar Perut: {{ $statusLingkarPerut }}
                    </div>

                    <div
                        class="status-card
                        {{ $statusTekananDarah == 'Normal'
                            ? 'status-card-green'
                            : ($statusTekananDarah == 'Pra-hipertensi'
                                ? 'status-card-yellow'
                                : ($statusTekananDarah == 'Hipertensi tingkat 1'
                                    ? 'status-card-orange'
                                    : ($statusTekananDarah == 'Hipertensi tingkat 2'
                                        ? 'status-card-red'
                                        : 'status-card-gray'))) }}">
                        Tekanan Darah: {{ $statusTekananDarah }}
                    </div>
                </div>
            </div>

            <div class="section-title text-xl font-semibold mb-4">Riwayat Kesehatan</div>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>IMT</th>
                        <th>Kolesterol Total</th>
                        <th>Tekanan Darah</th>
                        <th>Gula Darah Sewaktu</th>
                        <th>Gula Darah Puasa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patientRecords as $record)
                        <tr>
                            <td>{{ $record->record_date->format('d F Y') }}</td>
                            <td>{{ $record->berat_badan }} kg</td>
                            <td>{{ $record->tinggi_badan }} cm</td>
                            <td>
                                {{ number_format($record->berat_badan / pow($record->tinggi_badan / 100, 2), 2) }}
                            </td>
                            <td>{{ $record->kolesterol_total }} mg/dL</td>
                            <td>{{ $record->tekanan_darah_sistolik }}/{{ $record->tekanan_darah_diastolik }} mmHg</td>
                            <td>{{ $record->gula_darah_sewaktu }} mg/dL</td>
                            <td>{{ $record->gula_darah_puasa }} mg/dL</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="section-title text-xl font-semibold mb-4">Informasi Rekam Medis</div>
            <div class="text-base">
                <p><strong>Kolesterol:</strong> Kolesterol total yang tinggi dapat meningkatkan risiko penyakit jantung. Nilai normal adalah di bawah 200 mg/dL. Kategori:</p>
                <ul class="list-disc ml-6">
                    <li><span class="bg-green-200 text-green-800 px-2 py-1 rounded">Baik</span>: < 200 mg/dL</li>
                    <li><span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Normal</span>: 200-240 mg/dL</li>
                    <li><span class="bg-red-200 text-red-800 px-2 py-1 rounded">Tinggi</span>: > 240 mg/dL</li>
                </ul>
                <p class="mt-2"><strong>IMT (Indeks Massa Tubuh):</strong> IMT digunakan untuk menentukan status berat badan seseorang. Kategori:</p>
                <ul class="list-disc ml-6">
                    <li><span class="bg-green-200 text-green-800 px-2 py-1 rounded">Berat badan normal</span>: 18.5 - 23</li>
                    <li><span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Kelebihan berat badan</span>: 23 - 30</li>
                    <li><span class="bg-red-200 text-red-800 px-2 py-1 rounded">Kegemukan</span>: > 30</li>
                </ul>
                <p class="mt-2"><strong>Lingkar Perut:</strong> Lingkar perut yang tinggi bisa menandakan risiko penyakit metabolik. Nilai normal:</p>
                <ul class="list-disc ml-6">
                    <li><span class="bg-green-200 text-green-800 px-2 py-1 rounded">Normal</span>: < 90 cm (pria), < 80 cm (wanita)</li>
                    <li><span class="bg-red-200 text-red-800 px-2 py-1 rounded">Tinggi</span>: ≥ 90 cm (pria), ≥ 80 cm (wanita)</li>
                </ul>
                <p class="mt-2"><strong>Tekanan Darah:</strong> Tekanan darah diukur dalam dua angka. Kategori:</p>
                <ul class="list-disc ml-6">
                    <li><span class="bg-green-200 text-green-800 px-2 py-1 rounded">Normal</span>: < 120/80 mmHg</li>
                    <li><span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded">Pra-hipertensi</span>: 120-139/80-89 mmHg</li>
                    <li><span class="bg-orange-200 text-orange-800 px-2 py-1 rounded">Hipertensi Tingkat 1</span>: 140-159/90-99 mmHg</li>
                    <li><span class="bg-red-200 text-red-800 px-2 py-1 rounded">Hipertensi Tingkat 2</span>: ≥ 160/100 mmHg</li>
                </ul>
            </div>
            <div class="text-center mt-8 section-title">
                <p>Terima kasih telah mempercayakan kesehatan Anda kepada kami.</p>
                <p class="print:hidden">Harap cetak dan simpan dokumen ini sebagai referensi.</p>
            </div>
        </div>
    </div>
</body>

</html>
