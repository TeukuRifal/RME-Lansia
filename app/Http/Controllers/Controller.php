<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCheckSchedule;
abstract class Controller
{
    public function index(){
        $jadwal = HealthCheckSchedule::all();

        return view('welcome', compact('jadwal'));
    }

}
