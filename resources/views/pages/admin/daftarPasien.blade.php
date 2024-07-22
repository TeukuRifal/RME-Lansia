@extends('layouts.admin')

@section('title', 'Daftar Pasien')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="font-semibold">Data Pasien</h2>
        <!-- Include the SweetAlert library -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Tambah Akun Button -->
        <div class="flex justify-between items-center mb-6 py-2">
            <a href="{{ route('tambahPasien') }}"
                class="flex items-center border py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">
                <img src="{{ asset('images/addPasien.png') }}" alt="tambah pasien" class="w-5 h-5 mr-2 fill-black">
                Tambah Akun
            </a>
        </div>

        <!-- Tabel Daftar Pasien -->
        <div class="table-responsive shadow rounded-lg overflow-auto my-3 p-3">
            <table id="patientsTable" class="min-w-full bg-white shadow-md overflow-hidden m-2 border border-gray-600">
                <thead class="border">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Lengkap</th>
                        <th class="py-3 px-4">NIK</th>
                        <th class="py-3 px-4">Tanggal Lahir</th>
                        <th class="py-3 px-4">Umur</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Jenis Kelamin</th>
                        <th class="py-3 px-4">Agama</th>
                        <th class="py-3 px-4">Alamat</th>
                        <th class="py-3 px-4">No HP</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $patient->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $patient->nik }}</td>
                            <td class="py-3 px-4">{{ $patient->tanggal_lahir }}</td>
                            <td class="py-3 px-4">{{ $patient->umur }}</td>
                            <td class="py-3 px-4">{{ $patient->status_kawin }}</td>
                            <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                            <td class="py-3 px-4">{{ $patient->agama }}</td>
                            <td class="py-3 px-4">{{ $patient->alamat }}</td>
                            <td class="py-3 px-4">{{ $patient->no_hp }}</td>
                            <td class="py-3 px-4 flex gap-1">
                                <a href="{{ route('healthHistory', $patient->id) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('editPasien', $patient->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#patientsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                language: {
                    search: "Cari:",
                    paginate: {
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    },
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                    infoEmpty: "Tidak ada data tersedia",
                    zeroRecords: "Tidak ada data yang cocok ditemukan"
                }
            });
        });
    </script>
@endsection
