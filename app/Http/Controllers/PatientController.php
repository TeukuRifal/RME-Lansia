<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function kesehatan()
    {
        // Logic untuk halaman kesehatan pasien
        return view('pages.pasien.kesehatan');
    }
}
