@extends('layouts.admin')

@section('title', 'Daftar Pasien')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Data Pasien</h2>

        <!-- Tambah Akun Button -->
        <div class="flex justify-between items-center mb-6 py-2">
            <a href="{{ route('tambahPasien') }}"
                class="flex items-center bg-lightblue text-black font-semibold py-2 px-4 rounded shadow hover:bg-blue-600 transition duration-200">
                <img src="{{ asset('images/addPasien.png') }}" alt="tambah pasien" class="w-5 h-5 mr-2">
                Tambah Akun
            </a>
        
        </div>

        <!-- Tabel Daftar Pasien dengan Scroll Horizontal -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden border p-4">
            <div class="overflow-x-auto">
                <table id="patientsTable" class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-lightblue text-black border-b border-gray-300">
                        <tr>
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left whitespace-nowrap">Nama Lengkap</th>
                            <th class="py-3 px-4 text-left">NIK</th>
                            <th class="py-3 px-4 text-left whitespace-nowrap">Tanggal Lahir</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left whitespace-nowrap">Jenis Kelamin</th>
                            <th class="py-3 px-4 text-left">Agama</th>
                            <th class="py-3 px-4 text-left whitespace-nowrap">Alamat</th>
                            <th class="py-3 px-4 text-left">No HP</th>
                            <th class="py-3 px-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($patients as $patient)
                            <tr class="border-b border-gray-300 hover:bg-blue-50 transition duration-200">
                                <td class="py-3 px-6">{{ $loop->iteration }}</td>
                                <td class="py-3 px-6 whitespace-nowrap">{{ $patient->nama_lengkap }}</td>
                                <td class="py-3 px-4">{{ $patient->nik }}</td>
                                <td class="py-3 px-4 whitespace-nowrap">{{ $patient->tanggal_lahir }}</td>
                                <td class="py-3 px-4">{{ $patient->status_kawin }}</td>
                                <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                                <td class="py-3 px-4">{{ $patient->agama }}</td>
                                <td class="py-3 px-4 whitespace-nowrap">{{ $patient->alamat }}</td>
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
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Custom CSS for larger search box and table borders -->
    <style>
        .dataTables_filter {
            margin-bottom: 1rem; /* Add margin bottom to separate search box and table */
        }

        .dataTables_filter label {
            font-size: 1.25rem; /* Larger font size for search label */
        }

        .dataTables_filter input {
            width: 300px; /* Larger width for search input */
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        table.dataTable {
            border-collapse: separate !important;
            border-spacing: 0 !important;
            border: 1px solid #ddd !important;
        }

        table.dataTable thead th {
            border-bottom: 1px solid #ddd !important;
        }

        table.dataTable tbody td {
            border-bottom: 1px solid #ddd !important;
            border-right: 1px solid #ddd !important;
        }

        table.dataTable tbody tr:last-child td {
            border-bottom: none !important;
        }

        table.dataTable tbody td:last-child {
            border-right: none !important;
        }
    </style>

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
