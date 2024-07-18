<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\RiwayatKesehatanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\HealthCheckScheduleController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/landingpage', function () {
    return view('welcome');
});




Route::delete('/admin/hapus-pasien/{id}', [PasienController::class, 'deletePasien'])->name('deletePasien');

// Auth routes for admin and pasien
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD pasien
    Route::get('/admin/daftar-pasien', [PasienController::class, 'daftarPasien'])->name('daftarPasien');
    Route::get('/admin/tambah-pasien', [PasienController::class, 'tambahPasien'])->name('tambahPasien');
    Route::post('/admin/simpan-pasien', [PasienController::class, 'storePasien'])->name('simpanPasien');
    Route::get('/admin/edit-pasien/{id}', [PasienController::class, 'editPasien'])->name('editPasien');
    Route::post('/admin/update-pasien/{id}', [PasienController::class, 'updatePasien'])->name('updatePasien');

    // Rekam Medis
    Route::get('/admin/rekam-medis', [RiwayatKesehatanController::class, 'rekamMedis'])->name('rekamMedis');
    Route::get('/admin/rekam-medik/buat', [RiwayatKesehatanController::class, 'create'])->name('admin.patientRecords.create');
    Route::post('/admin/pasien-records', [RiwayatKesehatanController::class, 'store'])->name('simpanData');
    Route::get('/admin/fetchPatients', [RiwayatKesehatanController::class, 'fetchPatients'])->name('admin.fetchPatients');
    Route::get('/admin/pasien-record/add/{patient_id}', [RiwayatKesehatanController::class, 'addPatientRecord'])->name('addPatientRecord');
    Route::post('/admin/pasien-record/store/{patient_id}', [RiwayatKesehatanController::class, 'storePatientRecord'])->name('storePatientRecord');
    Route::get('/admin/health-history/filter', [RiwayatKesehatanController::class, 'filterByMonth'])->name('filterByMonth');

    // Riwayat Kesehatan
    Route::get('/riwayat/{patient_id}', [RiwayatKesehatanController::class, 'index'])->name('healthHistory');
    Route::get('/riwayat/edit/{record_id}', [RiwayatKesehatanController::class, 'editRiwayat'])->name('editRiwayat');
    Route::put('/riwayat/update/{record_id}', [RiwayatKesehatanController::class, 'update'])->name('updateRiwayat');

    // Fetch Health Record
    Route::get('/admin/fetchHealthRecord/{patient_id}', [RiwayatKesehatanController::class, 'fetchHealthRecord'])
        ->name('fetchHealthRecord');
});




// Super admin routes
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/superadmin/superadmins', [SuperAdminController::class, 'indexSuperadmins'])->name('superadmin.superadmins.index');
    Route::get('/superadmin/superadmins/create', [SuperAdminController::class, 'create'])->name('superadmin.superadmins.create');
    Route::post('/superadmin/superadmins', [SuperAdminController::class, 'store'])->name('superadmin.superadmins.store');
    Route::get('/superadmin/superadmins/{id}/edit', [SuperAdminController::class, 'edit'])->name('superadmin.superadmins.edit');
    Route::put('/superadmin/superadmins/{id}', [SuperAdminController::class, 'update'])->name('superadmin.superadmins.update');
    Route::delete('/superadmin/superadmins/{id}', [SuperAdminController::class, 'destroy'])->name('superadmin.superadmins.destroy');
    Route::get('/superadmin/logs', [SuperAdminController::class, 'logs'])->name('superadmin.logs');

});


// Custom login for super admin
Route::get('/superadmin/login', [AuthController::class, 'showSuperAdminLoginForm'])->name('superadmin.login');
Route::post('/superadmin/login', [AuthController::class, 'superAdminLogin'])->name('superadmin.login.post');

// pasien routes
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/beranda', [PasienController::class, 'index'])->name('beranda');
    Route::get('/profil', [PasienController::class, 'profil'])->name('profil');
    Route::get('/jadwal', [PasienController::class, 'jadwal'])->name('jadwal');


    
    
});
