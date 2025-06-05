<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Informasi\AspirasiJemaatController as AspirasiJemaatBackend;
use App\Http\Controllers\Backend\Informasi\PengumumanController;
use App\Http\Controllers\Backend\Jadwal\IbadahController;
use App\Http\Controllers\Backend\Laporan\KeuanganController;
use App\Http\Controllers\Backend\Manajemen\ProfileController as AdminProfileController;
use App\Http\Controllers\Frontend\AspirasiJemaatController as AspirasiJemaatFrontend;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController as UserProfileController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

//Auth

// Frontend

// Backend


/*
|--------------------------------------------------------------------------
| ROUTES PUBLIK
|--------------------------------------------------------------------------
*/
Route::get('/keuangan/export', [KeuanganController::class, 'export'])->name('keuangan.export');
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('tentang')->group(function () {
    Route::get('/sejarah', [HomeController::class, 'sejarahGereja'])->name('tentang.sejarah');
    Route::get('/struktur', [HomeController::class, 'strukturPengurus'])->name('tentang.struktur');
});

Route::get('/tentang', function () {
    return view('frontend.tentang');
})->name('tentang');

Route::prefix('pengumuman')->group(function () {
    Route::get('/', [HomeController::class, 'buletinGereja'])->name('pengumuman.buletin');
    Route::get('/ulang-tahun', [HomeController::class, 'ulangTahunJemaat'])->name('pengumuman.ulang_tahun');
});

Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri.public');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/jadwal-ibadah', [HomeController::class, 'jadwalIbadahMingguan'])->name('jadwal.ibadah');
Route::get('/jadwal-pelayanan', [HomeController::class, 'jadwalPelayananMingguan'])->name('jadwal.pelayanan');
Route::get('/laporan-keuangan', [HomeController::class, 'laporanKeuanganMingguan'])->name('laporan.keuangan');

Route::get('/aspirasi', [AspirasiJemaatFrontend::class, 'formPublic'])->name('aspirasi.form');
Route::post('/aspirasi', [AspirasiJemaatFrontend::class, 'storePublic'])->name('aspirasi.store');

Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/profil', [UserProfileController::class, 'show'])->name('user.profile');
    Route::get('/profil/edit', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profil', [UserProfileController::class, 'update'])->name('user.profile.update');
});

/*
|--------------------------------------------------------------------------
| AUTHENTIKASI
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.index');
    Route::post('/login', [LoginController::class, 'verify'])->name('auth.login.verify');

    // Register Routes
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
    Route::post('/register', [RegisterController::class, 'registerProcess'])->name('auth.register.process');
    Route::get('/register/activation/{token}', [RegisterController::class, 'verify'])->name('auth.register.verify');

    // Forgot Password Routes
    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('auth.forgot-password.index');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'process'])->name('auth.forgot-password.process');
});

// Logout Route (for authenticated users)
Route::middleware('auth')->post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

/*
|--------------------------------------------------------------------------
| BACKEND - ADMIN (DASHBOARD)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile', [AdminProfileController::class, 'show'])->name('dashboard.profile');
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('dashboard.profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('dashboard.profile.update');

    Route::resource('aspirasi', AspirasiJemaatBackend::class);
    Route::patch('/aspirasi/{id}/status', [AspirasiJemaatBackend::class, 'updateStatus'])->name('aspirasi.updateStatus');

    Route::resource('jadwal-ibadah', IbadahController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('pengumuman', PengumumanController::class);
});

/*
|--------------------------------------------------------------------------
| FILE STORAGE (akses file upload/gambar)
|--------------------------------------------------------------------------
*/

Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);

    if (!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    return Response::make($file, 200)->header("Content-Type", $type);
})->where('filename', '.*')->name('storage.file');
