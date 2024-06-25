<?php

// web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;

Route::get('/', function () {
    return view('auth.login');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/tambah-pasien', [AdminController::class, 'tambahPasien'])->name('tambahPasien');
    Route::post('/admin/store-pasien', [AdminController::class, 'storePasien'])->name('storePasien');
    Route::get('/admin/daftar-pasien', [AdminController::class, 'daftarPasien'])->name('daftarPasien');
    Route::get('/admin/edit-pasien/{id}', [AdminController::class, 'editPasien'])->name('editPasien');
    Route::put('/admin/update-pasien/{id}', [AdminController::class, 'updatePasien'])->name('updatePasien');
    Route::delete('/admin/delete-pasien/{id}', [AdminController::class, 'deletePasien'])->name('deletePasien');
    Route::get('/admin/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    Route::post('/admin/update-settings', [AdminController::class, 'updateSettings'])->name('updateSettings');
});

// Patient routes
Route::middleware(['auth', 'patient'])->group(function () {
    Route::get('/patient/kesehatan', [PatientController::class, 'kesehatan'])->name('patient.kesehatan');
});
