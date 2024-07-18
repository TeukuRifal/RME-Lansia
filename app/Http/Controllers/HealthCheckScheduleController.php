<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCheckSchedule;

class HealthCheckScheduleController extends Controller
{
    public function index()
    {
        $schedules = HealthCheckSchedule::all();
        return view('jadwal.index', compact('schedules'));
    }

    public function create()
    {
        return view('jadwal.tambahJadwal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'lokasi' => 'required|string|max:255',
        ]);

        HealthCheckSchedule::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal cek kesehatan berhasil ditambahkan.');
    }
}
