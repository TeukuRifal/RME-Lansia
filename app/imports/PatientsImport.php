<?php


namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Patient;

class PatientsImport implements ToArray, WithHeadingRow
{
    use Importable;

    private $previewData = [];

    public function array(array $array)
    {
        // Process the data
        foreach ($array as $row) {
            $this->previewData[] = [
                'nama_lengkap' => $row['nama_lengkap'],
                'nik' => $row['nik'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'agama' => $row['agama'],
                'alamat' => $row['alamat'],
                'no_hp' => $row['no_hp'],
                'pendidikan_terakhir' => $row['pendidikan_terakhir'],
                'pekerjaan' => $row['pekerjaan'],
                'status_kawin' => $row['status_kawin'],
                'gol_darah' => $row['gol_darah'],
                'email' => $row['email'],
            ];

            // Save data to database
            Patient::updateOrCreate(
                ['nik' => $row['nik']], // Unique identifier
                $row
            );
        }
    }

    public function getPreviewData()
    {
        return $this->previewData;
    }
}
