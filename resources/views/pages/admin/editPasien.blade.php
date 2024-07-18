@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-4">
        <div class="bg-white p-5 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-2">Edit Data Pasien</h2>
            <hr class="h-px my-6 bg-gray-200 border-0 dark:bg-gray-700">
            <form action="{{ route('updatePasien', ['id' => $pasien->id]) }}" method="POST">
                @csrf
                @method('POST')

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ implode('', $errors->all(':message ')) }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="nama_lengkap" class="block text-gray-700 font-bold">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                            value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="nik" class="block text-gray-700 font-bold">NIK</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik', $pasien->nik) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-gray-700 font-bold">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="umur" class="block text-gray-700 font-bold">Umur</label>
                        <input type="number" id="umur" name="umur" value="{{ old('umur', $pasien->umur) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block text-gray-700 font-bold">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @if (old('jenis_kelamin', $pasien->jenis_kelamin) == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if (old('jenis_kelamin', $pasien->jenis_kelamin) == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                        <textarea id="alamat" name="alamat"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-gray-700 font-bold">No. HP</label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="pendidikan_terakhir" class="block text-gray-700 font-bold">Pendidikan Terakhir</label>
                        <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir"
                            value="{{ old('pendidikan_terakhir', $pasien->pendidikan_terakhir) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="pekerjaan" class="block text-gray-700 font-bold">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $pasien->pekerjaan) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="status_kawin" class="block text-gray-700 font-bold">Status Kawin</label>
                        <select id="status_kawin" name="status_kawin"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                            <option value="">Pilih Status Kawin</option>
                            <option value="Belum Kawin" @if (old('status_kawin', $pasien->status_kawin) == 'Belum Kawin') selected @endif>Belum Kawin
                            </option>
                            <option value="Kawin" @if (old('status_kawin', $pasien->status_kawin) == 'Kawin') selected @endif>Kawin</option>
                            <option value="Cerai" @if (old('status_kawin', $pasien->status_kawin) == 'Cerai') selected @endif>Cerai</option>
                        </select>
                    </div>
                    <div>
                        <label for="gol_darah" class="block text-gray-700 font-bold">Golongan Darah</label>
                        <input type="text" id="gol_darah" name="gol_darah"
                            value="{{ old('gol_darah', $pasien->gol_darah) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-bold">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', $pasien->user->email) }}"
                            class="w-full p-2 border border-gray-300 rounded mt-1 focus:ring focus:ring-blue-200" required>
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
@endsection
