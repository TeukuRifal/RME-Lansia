<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCheckSchedule; // Add this line to import the HealthCheckSchedule class

class ProfileController extends Controller
{
    public function show()
    {
        // Ambil data jika diperlukan
        $schedules = HealthCheckSchedule::all();
        
        // Return view dengan data
        return view('profile.posbindu', ['schedules' => $schedules]);
    }
}
