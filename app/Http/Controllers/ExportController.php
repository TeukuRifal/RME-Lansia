<?php

namespace App\Http\Controllers;

use App\Exports\PatientsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }
}
