<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('beranda'); // Pastikan Anda memiliki beranda.blade.php di resources/views
    }

    public function index1()
    {
        return view('profile'); // Pastikan Anda memiliki beranda.blade.php di resources/views
    }
}
