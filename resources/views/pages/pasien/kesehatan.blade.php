@extends('layouts.main')

@section('content')
<div class="container">
    <div class="container m-auto p-4 my-auto">
        
        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">Data Diri</h2>
            <div class="grid grid-cols-2 gap-4">
                @php
                    $fields = [
                        'Nama Lengkap' => $patient->nama_lengkap,
                        'NIK' => $patient->nik,
                        'Tanggal Lahir' => $patient->tanggal_lahir,
                       
                        'Jenis Kelamin' => $patient->jenis_kelamin,
                        'Alamat' => $patient->alamat,
                        'No HP' => $patient->no_hp,
                        'Pendidikan Terakhir' => $patient->pendidikan_terakhir,
                        'Pekerjaan' => $patient->pekerjaan,
                        'Status Kawin' => $patient->status_kawin,
                        'Golongan Darah' => $patient->gol_darah,
                        'Email' => $patient->email,
                    ];
                @endphp

                @foreach($fields as $label => $value)
                    <div>
                        <p class="font-semibold">{{ $label }}</p>
                        <p class="bg-gray-100 p-2 rounded">{{ $value }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
