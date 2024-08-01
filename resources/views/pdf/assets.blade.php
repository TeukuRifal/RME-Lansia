<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekam Medis Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold text-center mb-6">Daftar Rekam Medis</h1>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table id="patientRecordsTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Pasien</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID
                            Pasien (NIK)</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal Rekam</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Riwayat PTM Keluarga</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Riwayat PTM Sendiri</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Merokok</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kurang Aktivitas Fisik</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kurang Sayur/Buah</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Konsumsi Alkohol</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stress</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat
                            Badan (kg)</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tinggi Badan (cm)</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Lingkar Perut (cm)</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tekanan Darah</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tekanan Darah Sistolik</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tekanan Darah Diastolik</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            indeks Massa Tubuh</th>
                            
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gula
                            Darah Sewaktu</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kolesterol Total</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Masalah Kesehatan</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Obat
                            Fasilitas</th>
                        <th class="py-3 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tindak Lanjut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($records as $record)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $record->patient->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $record->patient->nik }}</td>
                            <td class="py-3 px-4">{{ $record->record_date }}</td>
                            <td class="py-3 px-4">{{ $record->riwayat_ptm_keluarga ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->riwayat_ptm_sendiri ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->merokok ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->kurang_aktivitas_fisik ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->kurang_sayur_buah ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->konsumsi_alkohol ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->stress ?? ' - ' }}</td>
                            <td class="py-3 px-4">{{ $record->berat_badan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tinggi_badan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->lingkar_perut ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah_sistolik ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tekanan_darah_diastolik ?? '-' }}</td>
                            
                            <td class="py-3 px-4">{{ $record->gula_darah_sewaktu ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->kolesterol_total ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->masalah_kesehatan ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->obat_fasilitas ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $record->tindak_lanjut ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
