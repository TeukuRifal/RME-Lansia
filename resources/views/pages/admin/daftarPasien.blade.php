@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 mt-5">
    <h2 class="text-2xl font-bold mb-6">Daftar Pasien</h2>
    <!-- Tabel Daftar Pasien -->
    <div class="overflow-x-auto">
        <table id="patientsTable" class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Nama Lengkap</th>
                    <th class="py-3 px-4">NIK</th>
                    <th class="py-3 px-4">Tanggal Lahir</th>
                    <th class="py-3 px-4">Umur</th>
                    <th class="py-3 px-4">Jenis Kelamin</th>
                    <th class="py-3 px-4">Alamat</th>
                    <th class="py-3 px-4">No HP</th>
                    <th class="py-3 px-4">Pendidikan Terakhir</th>
                    <th class="py-3 px-4">Pekerjaan</th>
                    <th class="py-3 px-4">Status Kawin</th>
                    <th class="py-3 px-4">Gol. Darah</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Riwayat PTM Keluarga</th>
                    <th class="py-3 px-4">Riwayat PTM Sendiri</th>
                    <th class="py-3 px-4">Merokok</th>
                    <th class="py-3 px-4">Kurang Aktivitas Fisik</th>
                    <th class="py-3 px-4">Kurang Sayur Buah</th>
                    <th class="py-3 px-4">Konsumsi Alkohol</th>
                    <th class="py-3 px-4">Stress</th>
                    <th class="py-3 px-4">Berat Badan</th>
                    <th class="py-3 px-4">Tinggi Badan</th>
                    <th class="py-3 px-4">Indeks Massa Tubuh</th>
                    <th class="py-3 px-4">Lingkar Perut</th>
                    <th class="py-3 px-4">Tekanan Darah</th>
                    <th class="py-3 px-4">Gula Darah Sewaktu</th>
                    <th class="py-3 px-4">Kolesterol Total</th>
                    <th class="py-3 px-4">Masalah Kesehatan</th>
                    <th class="py-3 px-4">Obat & Fasilitas</th>
                    <th class="py-3 px-4">Tindak Lanjut</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                <tr class="hover:bg-gray-100">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $patient->nama_lengkap }}</td>
                    <td class="py-3 px-4">{{ $patient->nik }}</td>
                    <td class="py-3 px-4">{{ $patient->tanggal_lahir }}</td>
                    <td class="py-3 px-4">{{ $patient->umur }}</td>
                    <td class="py-3 px-4">{{ $patient->jenis_kelamin }}</td>
                    <td class="py-3 px-4">{{ $patient->alamat }}</td>
                    <td class="py-3 px-4">{{ $patient->no_hp }}</td>
                    <td class="py-3 px-4">{{ $patient->pendidikan_terakhir }}</td>
                    <td class="py-3 px-4">{{ $patient->pekerjaan }}</td>
                    <td class="py-3 px-4">{{ $patient->status_kawin }}</td>
                    <td class="py-3 px-4">{{ $patient->gol_darah }}</td>
                    <td class="py-3 px-4">{{ $patient->email }}</td>
                    <td class="py-3 px-4">{{ $patient->riwayat_ptm_keluarga }}</td>
                    <td class="py-3 px-4">{{ $patient->riwayat_ptm_sendiri }}</td>
                    <td class="py-3 px-4">{{ $patient->merokok }}</td>
                    <td class="py-3 px-4">{{ $patient->kurang_aktivitas_fisik }}</td>
                    <td class="py-3 px-4">{{ $patient->kurang_sayur_buah }}</td>
                    <td class="py-3 px-4">{{ $patient->konsumsi_alkohol }}</td>
                    <td class="py-3 px-4">{{ $patient->stress }}</td>
                    <td class="py-3 px-4">{{ $patient->berat_badan }}</td>
                    <td class="py-3 px-4">{{ $patient->tinggi_badan }}</td>
                    <td class="py-3 px-4">{{ $patient->indeks_massa_tubuh }}</td>
                    <td class="py-3 px-4">{{ $patient->lingkar_perut }}</td>
                    <td class="py-3 px-4">{{ $patient->tekanan_darah }}</td>
                    <td class="py-3 px-4">{{ $patient->gula_darah_sewaktu }}</td>
                    <td class="py-3 px-4">{{ $patient->kolesterol_total }}</td>
                    <td class="py-3 px-4">{{ $patient->masalah_kesehatan }}</td>
                    <td class="py-3 px-4">{{ $patient->obat_fasilitas }}</td>
                    <td class="py-3 px-4">{{ $patient->tindak_lanjut }}</td>
                    <td class="py-3 px-4 flex justify-between gap-1">
                        <a href="{{ route('editPasien', $patient->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-edit"></i> Edit</a>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded delete-button" data-id="{{ $patient->id }}"><i class="fas fa-trash-alt"></i> Hapus</button>
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
                        url: '/admin/delete-pasien/' + patientId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                "Dihapus!",
                                "Data pasien telah dihapus.",
                                "success"
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire(
                                "Error",
                                "Terjadi kesalahan. Data pasien tidak bisa dihapus.",
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
@endsection
