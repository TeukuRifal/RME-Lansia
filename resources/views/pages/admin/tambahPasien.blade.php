@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <form action="{{ route('simpanPasien') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-5 rounded-lg shadow-md">
            <div class="header flex justify-between flex-row p-2">
                <h2 class="text-2xl font-bold mb-2">Tambah Data Diri Klien</h2>
            </div>

            <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
            @csrf


            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Ada kesalahan!</strong>
                    <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ([
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'NIK',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'no_hp' => 'No HP',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'pekerjaan' => 'Pekerjaan',
            'status_kawin' => 'Status Pernikahan',
            'gol_darah' => 'Golongan Darah',
            'email' => 'Email (opsional)',
        ] as $field => $label)
                    <div>
                        <label for="{{ $field }}" class="block text-gray-700 font-bold">{{ $label }}</label>
                        @if ($field == 'alamat')
                            <textarea id="{{ $field }}" name="{{ $field }}"
                                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required></textarea>
                        @elseif ($field == 'jenis_kelamin' || $field == 'agama' || $field == 'status_kawin')
                            <select id="{{ $field }}" name="{{ $field }}"
                                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200"
                                required>
                                <option value="">Pilih {{ $label }}</option>
                                @foreach ([
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'agama' => ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'],
            'status_kawin' => ['Belum Menikah', 'Menikah', 'Janda', 'Duda'],
        ][$field] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $field == 'tanggal_lahir' ? 'date' : ($field == 'email' ? 'email' : 'text') }}"
                                id="{{ $field }}" name="{{ $field }}"
                                class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200"
                                required>
                        @endif
                    </div>
                @endforeach

                <div>
                    <label for="foto" class="block text-gray-700 font-bold">Foto</label>
                    <input type="file" id="foto" name="foto"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit"
                    class="bg-lightblue text-black font-semibold px-4 py-2 rounded shadow hover:bg-blue-400">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Include SweetAlert via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
