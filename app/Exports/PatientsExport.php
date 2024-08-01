<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PatientsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    /**
     * Mengambil data yang akan diekspor
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Patient::all();
    }

    /**
     * Mapping data untuk setiap baris dalam Excel
     *
     * @param  mixed $patient
     * @return array
     */
    public function map($patient): array
    {
        return [
            $patient->user_id,
            $patient->nama_lengkap,
            $patient->nik,
            $patient->tanggal_lahir,
            $patient->jenis_kelamin,
            $patient->agama,
            $patient->alamat,
            $patient->no_hp,
            $patient->pendidikan_terakhir,
            $patient->pekerjaan,
            $patient->status_kawin,
            $patient->gol_darah,
            $patient->email,
        ];
    }

    /**
     * Menetapkan judul kolom di file Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'User ID',
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

    /**
     * Styling untuk kolom dan baris
     *
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // Gaya header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => 'D9EAD3'],
            ],
        ];

        // Menyusun gaya header
        $sheet->getStyle('A1:M1')->applyFromArray($headerStyle);

        // Mengatur lebar kolom secara otomatis
        foreach (range('A', 'M') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        return [
            // Menyusun gaya header
            'A1:M1' => $headerStyle,
        ];
    }

    /**
     * Menambahkan event untuk styling lebih lanjut
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Gaya border
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ];

                $sheet->getStyle('A1:M' . $sheet->getHighestRow())->applyFromArray($styleArray);
            },
        ];
    }
}
