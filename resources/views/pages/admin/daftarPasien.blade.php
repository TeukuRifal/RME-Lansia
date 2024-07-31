@extends('layouts.admin')

@section('title', 'Daftar Pasien')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Data Pasien</h2>

        <!-- Tambah Akun Button -->
        <div class="flex justify-between items-center mb-6 py-2">
            <a href="{{ route('tambahPasien') }}"
                class="flex items-center bg-blue-500 text-white py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">
                <img src="{{ asset('images/addPasien.png') }}" alt="tambah pasien" class="w-5 h-5 mr-2">
                Tambah Akun
            </a>
            <a href="{{ url('/export-patients') }}" class="btn btn-success">Export Ke Excel</a>
        </div>

        <!-- Tabel Daftar Pasien -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto p-2 border">
            <table id="patientsTable" class="min-w-full bg-white p-2">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-6 text-left">Foto</th>
                        <th class="py-3 px-4 text-left">Nama Lengkap</th>
                        <th class="py-3 px-4 text-left">NIK</th>
                        <th class="py-3 px-4 text-left">Tanggal Lahir</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Jenis Kelamin</th>
                        <th class="py-3 px-4 text-left">Agama</th>
                        <th class="py-3 px-4 text-left">Alamat</th>
                        <th class="py-3 px-4 text-left">No HP</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($patients as $patient)
                        <tr class="border-b hover:bg-blue-50 transition duration-200">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-left">
                                @if ($patient->foto)
                                    <img src="{{ Storage::url($patient->foto) }}" alt="Foto Pasien"
                                        class="w-10 h-10 rounded-full">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="Foto Default"
                                        class="w-10 h-10 rounded-full">
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $patient->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $patient->nik }}</td>
                            <td class="py-3 px-4">{{ $patient->tanggal_lahir }}</td>
                            <td class="py-3 px-4">{{ $patient->status_kawin }}</td>
                            <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                            <td class="py-3 px-4">{{ $patient->agama }}</td>
                            <td class="py-3 px-4">{{ $patient->alamat }}</td>
                            <td class="py-3 px-4">{{ $patient->no_hp }}</td>
                            <td class="py-3 px-4 flex gap-2">
                                <a href="{{ route('healthHistory', $patient->id) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <a href="{{ route('editPasien', $patient->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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
