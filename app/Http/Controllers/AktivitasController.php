<?php

// app/Http/Controllers/AktivitasController.php
namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = Aktivitas::all()->map(function ($item) {
            $item->tgl_aktivitas = Carbon::parse($item->tgl_aktivitas);
            return $item;
        });
        return view('pages.kegiatan.index', compact('aktivitas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tgl_aktivitas' => 'required|date',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('gambar')->store('images', 'public');

        Aktivitas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_aktivitas' => $request->tgl_aktivitas,
            'gambar' => $path,
        ]);

        return redirect()->route('aktivitas.index')->with('success', 'Dokumentasi kegiatan berhasil ditambahkan.');
    }
}
