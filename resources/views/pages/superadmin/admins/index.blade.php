@extends('layouts.super')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Manage Superadmins</h1>
        <div class="tambahadm flex items-center p-4">
            <a href="{{ route('superadmin.superadmins.create') }}"
                class="flex items-center bg-blue-500 text-white py-2 px-4 rounded">
                <img src="{{ asset('images/AddAdmin.png') }}" alt="add" class="w-5 h-5 mr-2">
                Tambah Akun
            </a>
        </div>
        <table id="patientsTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($superadmins as $superadmin)
                    <tr>
                        <td class="py-2 px-4">{{ $superadmin->name }}</td>
                        <td class="py-2 px-4">{{ $superadmin->email }}</td>
                        <td class="py-2 px-4">{{ $superadmin->role }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('superadmin.superadmins.edit', $superadmin->id) }}"
                                class="bg-yellow-500 text-white py-1 px-2 rounded">Edit</a>
                            <button type="button" class="bg-red-500 text-white py-1 px-2 rounded delete-button"
                                data-id="{{ $superadmin->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function(e) {
                e.preventDefault();
                var superadminId = $(this).data('id');
                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/superadmin/superadmins/' + superadminId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    "Dihapus!",
                                    "Akun Berhasil dihapus.",
                                    "success"
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    "Error",
                                    "Terjadi kesalahan. Akun tidak bisa dihapus.",
                                    "error"
                                );
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            "Dibatalkan",
                            "Data Anda aman :)",
                            "error"
                        );
                    }
                });
            });
        });
    </script>
@endpush
