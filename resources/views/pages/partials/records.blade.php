@if(isset($records) && $records->count() > 0)
<div class="flex justify-between">
    <div class="w-1/2">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-200">
                <tr>
                    <th class="w-1/3 px-4 py-2">No</th>
                    <th class="w-1/3 px-4 py-2">Data</th>
                    <th class="w-1/3 px-4 py-2">Angka</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $index => $record)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Riwayat Penyakit Keluarga</td>
                    <td class="border px-4 py-2">{{ $record->riwayat_ptm_keluarga }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Riwayat Penyakit Sendiri</td>
                    <td class="border px-4 py-2">{{ $record->riwayat_ptm_sendiri }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Merokok</td>
                    <td class="border px-4 py-2">{{ $record->merokok }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Kurang Aktivitas Fisik</td>
                    <td class="border px-4 py-2">{{ $record->kurang_aktivitas_fisik }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Kurang Sayur Buah</td>
                    <td class="border px-4 py-2">{{ $record->kurang_sayur_buah }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Konsumsi Alkohol</td>
                    <td class="border px-4 py-2">{{ $record->konsumsi_alkohol }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Berat Badan</td>
                    <td class="border px-4 py-2">{{ $record->berat_badan }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Tinggi Badan</td>
                    <td class="border px-4 py-2">{{ $record->tinggi_badan }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Indeks Massa Tubuh</td>
                    <td class="border px-4 py-2">{{ $record->indeks_massa_tubuh }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Lingkar Perut</td>
                    <td class="border px-4 py-2">{{ $record->lingkar_perut }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Tekanan Darah</td>
                    <td class="border px-4 py-2">{{ $record->tekanan_darah }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Gula Darah Sewaktu</td>
                    <td class="border px-4 py-2">{{ $record->gula_darah_sewaktu }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Kolesterol Total</td>
                    <td class="border px-4 py-2">{{ $record->kolesterol_total }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Masalah Kesehatan</td>
                    <td class="border px-4 py-2">{{ $record->masalah_kesehatan }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Obat Fasilitas</td>
                    <td class="border px-4 py-2">{{ $record->obat_fasilitas }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">Tindak Lanjut</td>
                    <td class="border px-4 py-2">{{ $record->tindak_lanjut }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="mt-4 text-center text-gray-500">
    Tidak ada data yang tersedia untuk bulan dan tahun yang dipilih.
</div>
@endif
