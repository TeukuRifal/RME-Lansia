<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditDataPasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChartController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/pasien', function () {
    return view('pages/pasien');
});




Route::get('pages/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/tambah-pasien', [AdminController::class, 'tambahPasien'])->name('tambahPasien');
Route::post('/admin/tambah-pasien', [AdminController::class, 'storePasien'])->name('storePasien');
Route::get('/admin/daftar-pasien', [AdminController::class, 'daftarPasien'])->name('daftarPasien');
Route::get('/pages/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
Route::post('/pages/admin/pengaturan', [AdminController::class, 'updateSettings'])->name('updateSettings');

Route::delete('/admin/delete-pasien/{id}', [AdminController::class, 'deletePasien'])->name('deletePasien');


Route::get('/admin/edit-pasien/{id}', [EditDataPasienController::class, 'editPasien'])->name('editPasien');
Route::post('/admin/edit-pasien/{id}', [EditDataPasienController::class, 'updatePasien'])->name('updatePasien');
   

