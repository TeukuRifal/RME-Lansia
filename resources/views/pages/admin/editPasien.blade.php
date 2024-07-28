@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-2">Edit Data Pasien</h2>
        <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
        <form action="{{ route('updatePasien', ['id' => $pasien->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ([
                    'nama_lengkap' => 'Nama Lengkap',
                    'nik' => 'NIK',
                    'tanggal_lahir' => 'Tanggal Lahir',
                    'jenis_kelamin' => 'Jenis Kelamin',
                    'alamat' => 'Alamat',
                    'no_hp' => 'No. HP',
                    'pendidikan_terakhir' => 'Pendidikan Terakhir',
                    'pekerjaan' => 'Pekerjaan',
                    'status_kawin' => 'Status Kawin',
                    'gol_darah' => 'Golongan Darah',
                    'email' => 'Email'
                ] as $field => $label)
                <div>
                    <label for="{{ $field }}" class="block text-gray-700 font-bold">{{ $label }}</label>
                    @if ($field == 'alamat')
                    <textarea id="{{ $field }}" name="{{ $field }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200"
                        required>{{ old($field, $pasien->$field) }}</textarea>
                    @elseif ($field == 'jenis_kelamin' || $field == 'status_kawin')
                    <select id="{{ $field }}" name="{{ $field }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                        <option value="">Pilih {{ $label }}</option>
                        @foreach (['jenis_kelamin' => ['Laki-laki', 'Perempuan'], 'status_kawin' => ['Belum Menikah', 'Menikah', 'Cerai']][$field] as $option)
                        <option value="{{ $option }}" @if (old($field, $pasien->$field) == $option) selected @endif>{{ $option }}</option>
                        @endforeach
                    </select>
                    @else
                    <input type="{{ $field == 'tanggal_lahir' ? 'date' : 'text' }}" id="{{ $field }}" name="{{ $field }}"
                        value="{{ old($field, $field == 'email' ? $pasien->user->email : $pasien->$field) }}"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    @endif
                </div>
                @endforeach

                <div>
                    <label for="foto" class="block text-gray-700 font-bold">Foto</label>
                    <input type="file" id="foto" name="foto"
                        class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" onchange="previewImage(event)">
                    @if ($pasien->foto)
                    <img src="{{ Storage::url($pasien->foto) }}" alt="Foto Pasien" id="preview" class="mt-2 h-20 w-20 object-cover">
                    @else
                    <img id="preview" class="mt-2 h-20 w-20 object-cover hidden">
                    @endif 
                    
                </div>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-200">Simpan
                    Perubahan</button>
                <a href="{{ route('daftarPasien') }}"
                    class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-gray-200">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
