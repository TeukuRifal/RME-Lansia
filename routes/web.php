<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes for admin and patient
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
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

// Patient routes
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/pasien/dashoard', [PatientController::class, 'kesehatan'])->name('kesehatan');
    Route::get('/pasien/profil', [PatientController::class, 'profil'])->name('profil');
    
});
