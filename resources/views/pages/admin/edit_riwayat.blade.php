@extends('layouts.admin')

@section('title', 'Edit Riwayat Kesehatan')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-2">Edit Riwayat Kesehatan</h2>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        <form action="{{ route('updateRiwayat', $record->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ([
                    'record_date' => 'Tanggal Rekam',
                    'riwayat_ptm_keluarga' => 'Riwayat PTM Keluarga',
                    'riwayat_ptm_sendiri' => 'Riwayat PTM Sendiri',
                    'merokok' => 'Merokok',
                    'kurang_aktivitas_fisik' => 'Kurang Aktivitas Fisik',
                    'kurang_sayur_buah' => 'Kurang Sayur/Buah',
                    'konsumsi_alkohol' => 'Konsumsi Alkohol',
                    'berat_badan' => 'Berat Badan (kg)',
                    'tinggi_badan' => 'Tinggi Badan (cm)',
                    'lingkar_perut' => 'Lingkar Perut (cm)',
                    'asam_urat' => 'Asam Urat',
                    'tekanan_darah_sistolik' => 'Tekanan Darah Sistolik',
                    'tekanan_darah_diastolik' => 'Tekanan Darah Diastolik',
                    'gula_darah_sewaktu' => 'Gula Darah Sewaktu',
                    'gula_darah_puasa' => 'Gula Darah Puasa',
                    'kolesterol_total' => 'Kolesterol Total',
                    'masalah_kesehatan' => 'Masalah Kesehatan',
                    'obat' => 'Obat & Fasilitas',
                    'tindak_lanjut' => 'Tindak Lanjut'
                ] as $field => $label)
                <div>
                    <label for="{{ $field }}" class="block text-gray-700 font-bold">{{ $label }}</label>
                    @if ($field == 'masalah_kesehatan' || $field == 'obat' || $field == 'tindak_lanjut')
                    <textarea id="{{ $field }}" name="{{ $field }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">{{ old($field, $record->$field) }}</textarea>
                    @elseif ($field == 'record_date')
                    <input type="date" id="{{ $field }}" name="{{ $field }}"
                        value="{{ old($field, $record->$field->format('Y-m-d')) }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
                    @else
                    <input type="text" id="{{ $field }}" name="{{ $field }}"
                        value="{{ old($field, $record->$field) }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
                    @endif
                </div>
                @endforeach
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-200">Simpan
                    Perubahan</button>
                <a href="{{ route('rekamMedis') }}"
                    class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
