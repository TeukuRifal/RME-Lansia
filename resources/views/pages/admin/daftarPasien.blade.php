@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-2xl font-bold mb-6">Daftar Pasien</h2>
        <!-- Tabel Daftar Pasien -->
        <div class="table-responsive">
            <table id="patientsTable" class="table table-striped table-bordered table-hover p-2 ">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Tanggal Lahir</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Pekerjaan</th>
                        <th>Status Kawin</th>
                        <th>Gol. Darah</th>
                        <th>Email</th>
                        <th>Riwayat PTM Keluarga</th>
                        <th>Riwayat PTM Sendiri</th>
                        <th>Merokok</th>
                        <th>Kurang Aktivitas Fisik</th>
                        <th>Kurang Sayur Buah</th>
                        <th>Konsumsi Alkohol</th>
                        <th>Stress</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Indeks Massa Tubuh</th>
                        <th>Lingkar Perut</th>
                        <th>Tekanan Darah</th>
                        <th>Gula Darah Sewaktu</th>
                        <th>Kolesterol Total</th>
                        <th>Masalah Kesehatan</th>
                        <th>Obat & Fasilitas</th>
                        <th>Tindak Lanjut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $patient->nama_lengkap }}</td>
                            <td>{{ $patient->nik }}</td>
                            <td>{{ $patient->tanggal_lahir }}</td>
                            <td>{{ $patient->umur }}</td>
                            <td>{{ $patient->jenis_kelamin }}</td>
                            <td>{{ $patient->alamat }}</td>
                            <td>{{ $patient->no_hp }}</td>
                            <td>{{ $patient->pendidikan_terakhir }}</td>
                            <td>{{ $patient->pekerjaan }}</td>
                            <td>{{ $patient->status_kawin }}</td>
                            <td>{{ $patient->gol_darah }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->riwayat_ptm_keluarga }}</td>
                            <td>{{ $patient->riwayat_ptm_sendiri }}</td>
                            <td>{{ $patient->merokok }}</td>
                            <td>{{ $patient->kurang_aktivitas_fisik }}</td>
                            <td>{{ $patient->kurang_sayur_buah }}</td>
                            <td>{{ $patient->konsumsi_alkohol }}</td>
                            <td>{{ $patient->stress }}</td>
                            <td>{{ $patient->berat_badan }}</td>
                            <td>{{ $patient->tinggi_badan }}</td>
                            <td>{{ $patient->indeks_massa_tubuh }}</td>
                            <td>{{ $patient->lingkar_perut }}</td>
                            <td>{{ $patient->tekanan_darah }}</td>
                            <td>{{ $patient->gula_darah_sewaktu }}</td>
                            <td>{{ $patient->kolesterol_total }}</td>
                            <td>{{ $patient->masalah_kesehatan }}</td>
                            <td>{{ $patient->obat_fasilitas }}</td>
                            <td>{{ $patient->tindak_lanjut }}</td>
                            <td>
                                <a href="{{ route('editPasien', $patient->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <button class="btn btn-danger btn-sm delete-button" data-id="{{ $patient->id }}"><i
                                        class="fas fa-trash-alt"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#patientsTable').DataTable();

            $('.delete-button').on('click', function(e) {
                e.preventDefault();
                var patientId = $(this).data('id');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data ini tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan!",
                    reverseButtons: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/delete-pasien/' + patientId,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                swal.fire(
                                    "Dihapus!",
                                    "Data pasien telah dihapus.",
                                    "success"
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                swal.fire(
                                    "Error",
                                    "Terjadi kesalahan. Data pasien tidak bisa dihapus.",
                                    "error"
                                );
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swal.fire(
                            "Dibatalkan",
                            "Data Anda aman :)",
                            "error"
                        );
                    }
                });
            });
        });
    </script>
@endsection
