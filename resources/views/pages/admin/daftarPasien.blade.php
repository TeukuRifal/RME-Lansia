@extends('layouts.admin')

@section('title', 'Daftar Pasien')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold text-blue-800 mb-4">Data Klien</h2>

    <!-- Tambah Akun Button -->
    <div class="flex justify-between items-center mb-6 py-2">
        <a href="{{ route('tambahPasien') }}" 
            class="flex items-center bg-lightblue text-black font-semibold py-2 px-4 rounded shadow hover:scale-110 transition duration-200">
            <i class="bi bi-person-plus text-xl mr-2"></i> Tambah Akun
        </a>
        <a href="{{ url('/export-patients') }}" class="btn btn-success">
            <i class="bi bi-file-earmark-spreadsheet"></i> Export Ke Excel
        </a>
    </div>

    <!-- Tabel Daftar Pasien dengan Scroll Horizontal -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden border p-4">
        <div class="overflow-x-auto">
            <table id="patientsTable" class="min-w-full bg-white border border-gray-300">
                <thead class="bg-lightblue text-black border-b border-gray-300">
                    <tr>
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Foto</th>
                        <th class="py-3 px-4 text-left">Nama Lengkap</th>
                        <th class="py-3 px-4 text-left">NIK</th>
                        <th class="py-3 px-4 text-left">Tanggal Lahir</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-left">Jenis Kelamin</th>
                        <th class="py-3 px-4 text-left">No HP</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($patients as $patient)
                        <tr class="border-b border-gray-300 hover:bg-blue-50 transition duration-200">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">
                                <div class="bg-gray-300 rounded-full w-16 h-16 flex items-center justify-center">
                                    @if ($patient->foto)
                                        <img src="{{ Storage::url($patient->foto) }}" alt="Foto Pasien" class="w-full h-full rounded-full object-cover">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="Foto Default" class="w-full h-full rounded-full object-cover">
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">{{ $patient->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $patient->nik }}</td>
                            <td class="py-3 px-4">{{ $patient->tanggal_lahir }}</td>
                            <td class="py-3 px-4">{{ $patient->status_kawin }}</td>
                            <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                            <td class="py-3 px-4">{{ $patient->no_hp }}</td>
                            <td class="py-3 px-4 flex gap-2">
                                <a href="{{ route('healthHistory', $patient->id) }}"
                                    class="bg-green-500 hover:bg-green-600 text-white py-1 px-2 rounded flex items-center">
                                    <i class="bi bi-eye-fill mr-1"></i> Lihat
                                </a>
                                <a href="{{ route('editPasien', $patient->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-2 rounded flex items-center">
                                    <i class="bi bi-pencil-fill mr-1"></i> Edit
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
        border-collapse: collapse;
        width: 100%;
    }

    table.dataTable thead th {
        border-bottom: 2px solid #ddd;
        padding: 0.75rem;
        text-align: left;
    }

    table.dataTable tbody td {
        border-bottom: 1px solid #ddd;
        padding: 0.75rem;
        text-align: left;
    }

    table.dataTable tbody tr:hover {
        background-color: #f5f5f5;
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
