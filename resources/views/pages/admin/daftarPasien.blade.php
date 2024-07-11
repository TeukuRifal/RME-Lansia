@extends('layouts.admin')

@section('title', 'Daftar Pasien')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6">Data Pasien</h2>

        <!-- Tambah Akun Button -->
        <div class="flex justify-between items-center mb-6 p-2">
            <a href="{{ route('tambahPasien') }}"
                class="flex items-center bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">
                <img src="{{ asset('images/addPasien.png') }}" alt="tambah pasien" class="w-5 h-5 mr-2">
                Tambah Akun
            </a>
        </div>

        @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}",
                footer: '<a href="{{ route('admin.patientRecords.create') }}">Tambah Data ?</a>'
            });
        </script>
        @endif

        <!-- Tabel Daftar Pasien -->
        <div class="table-responsive shadow rounded-lg overflow-auto">
            <table id="patientsTable" class="min-w-full bg-white shadow-md  overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama Lengkap</th>
                        <th class="py-3 px-4">NIK</th>
                        <th class="py-3 px-4">Tanggal Lahir</th>
                        <th class="py-3 px-4">Umur</th>
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
                            <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                            <td class="py-3 px-4">{{ $patient->agama }}</td>
                            <td class="py-3 px-4">{{ $patient->alamat }}</td>
                            <td class="py-3 px-4">{{ $patient->no_hp }}</td>
                            <td class="py-3 px-4 flex gap-1">
                                <a href="{{ route('healthHistory', $patient->id) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-200"><i
                                        class="fas fa-eye"></i> Lihat</a>
                                <a href="{{ route('editPasien', $patient->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200"><i
                                        class="fas fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include the SweetAlert library -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script JavaScript -->
    <script>
        $(document).ready(function() {
            $('#patientsTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
                },
                "scrollX": true,
                "paging": true,
                "lengthMenu": [10, 25, 50, 100],
                "pageLength": 10
            });

            // Optional: Show success message with SweetAlert2
            @if (session('success'))
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success"
                });
            @endif
        });
    </script>
@endsection
