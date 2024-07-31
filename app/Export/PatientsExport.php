<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Patient::all();
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIK',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'No HP',
            'Pendidikan Terakhir',
            'Pekerjaan',
            'Status Kawin',
            'Gol Darah',
            'Email',
        ];
    }
}
