<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserCetakController;
use App\Http\Controllers\Kepsek\KepsekDashboardController;
use App\Http\Controllers\Kepsek\KepsekLaporanController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;



// Halaman utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Register 
Route::get('/register', [RegisterUserController::class, 'show'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register'])->name('register.store');

// Login & Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Forgot Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Passwrord
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// Edit Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// API/WA Gateway Routes
Route::get('/api', [ApiController::class, 'view'])->name('api.view');
Route::get('/api/send', [ApiController::class, 'send'])->name('api.send');

// Dashboard Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/hasil', [AdminDashboardController::class, 'hasil'])->name('admin.hasil');
    
    // Pendaftaran
    Route::patch('/pendaftar/{id}/status', [PendaftaranController::class, 'updateStatus'])->name('admin.pendaftar.updateStatus');
    Route::get('/pendaftar/{id}/edit', [PendaftaranController::class, 'edit'])->name('admin.pendaftar.edit');
    Route::put('/pendaftar/{id}', [PendaftaranController::class, 'update'])->name('admin.pendaftar.update');
    Route::delete('/admin/pendaftar/{id}', [PendaftaranController::class, 'destroy'])->name('admin.pendaftar.destroy');

    // Halaman tambahan
    Route::get('/laporan', [AdminLaporanController::class, 'laporan'])->name('admin.laporan');
    Route::get('/laporan/cetak', [AdminLaporanController::class, 'cetak'])->name('admin.laporan.cetak');
    Route::get('/export-excel', [AdminDashboardController::class, 'exportExcel'])->name('admin.export.excel');

    // Halaman Informasi
    Route::get('/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
    Route::get('/informasi/create', [InformasiController::class, 'create'])->name('admin.informasi.create');
    Route::post('/informasi', [InformasiController::class, 'store'])->name('admin.informasi.store');
    Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('admin.informasi.edit');
    Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
    Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
    
    // Halaman Jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('admin.jadwal.index');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('admin.jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('admin.jadwal.store');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('admin.jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('admin.jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('admin.jadwal.destroy');

    // CRUD Data User
    Route::get('/data-user', [UserAdminController::class, 'index'])->name('admin.data-user.index');
    Route::get('/data-user/create', [UserAdminController::class, 'create'])->name('admin.data-user.create');
    Route::post('/data-user', [UserAdminController::class, 'store'])->name('admin.data-user.store');
    Route::get('/data-user/{id}/edit', [UserAdminController::class, 'edit'])->name('admin.data-user.edit');
    Route::put('/data-user/{id}', [UserAdminController::class, 'update'])->name('admin.data-user.update');
    Route::delete('/data-user/{id}', [UserAdminController::class, 'destroy'])->name('admin.data-user.destroy');
});

// Dashboard Kepsek
Route::prefix('kepsek')->middleware(['auth', 'role:kepsek'])->group(function () {
    Route::get('/dashboard', [KepsekDashboardController::class, 'index'])->name('kepsek.dashboard');
    Route::get('/hasil', [KepsekDashboardController::class, 'hasil'])->name('kepsek.hasil');
    Route::get('/export-excel', [KepsekDashboardController::class, 'exportExcel'])->name('kepsek.export.excel');
    Route::get('/laporan', [KepsekLaporanController::class, 'laporan'])->name('kepsek.laporan');
    Route::get('/laporan/cetak', [KepsekLaporanController::class, 'cetak'])->name('kepsek.laporan.cetak');
});


// Dashboard User
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    // Dashboard Siswa
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('siswa.dashboard');

    // Pendaftaran Siswa
    Route::get('/pendaftaran', [PendaftaranController::class, 'showForm'])->name('daftar.create');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('daftar.store');

    // Hasil dan Status
    Route::get('/hasil', [UserDashboardController::class, 'hasilPendaftaran'])->name('siswa.hasil');
    Route::get('/status', [UserDashboardController::class, 'statusPendaftaran'])->name('siswa.status');

    // Halaman Cetak
    Route::get('/cetak-berkas', [UserCetakController::class, 'cetakBerkas'])->name('siswa.berkas');
    Route::get('/cetak-berkas/{id}', [UserCetakController::class, 'cetakBerkasPDF'])->name('siswa.berkas.pdf');
    Route::get('/cetak-surat/{id}', [UserCetakController::class, 'cetakSuratPenerimaan'])->name('siswa.surat.pdf');
});