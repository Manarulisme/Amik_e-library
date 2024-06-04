<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\PengabdianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/dashboard/buku', BukuController::class);
    Route::resource('/dashboard/penelitian', PenelitianController::class);
    Route::resource('/dashboard/pengabdian', PengabdianController::class);
    Route::resource('/dashboard/buku', BukuController::class);
    Route::get('/dashboard/penelitian/download/{id}', [PenelitianController::class, 'download_penelitian'])->name('penelitian_download');
    Route::get('/dashboard/pengabdian/download/{id}', [PengabdianController::class, 'download_pengabdian'])->name('pengabdian_download');
    Route::get('/dashboard/buku/download/{id}', [BukuController::class, 'download_buku'])->name('buku_download');
    Route::get('/dashboard/download', [PenelitianController::class, 'download'])->name('coba_download');
});
// Route Public
Route::get('/', [FrontController::class, 'index']);

Route::get('/data-penelitian', [FrontController::class, 'penelitian'])->name('data-penelitian');
Route::get('/data-penelitian/download/{id}', [PenelitianController::class, 'download_penelitian'])->name('penelitian_downloads');

Route::get('/data-pengabdian', [FrontController::class, 'pengabdian'])->name('data-pengabdian');
Route::get('/data-pengabdian/download/{id}', [PengabdianController::class, 'download_pengabdian'])->name('pengabdian_downloads');

Route::get('/data-buku', [FrontController::class, 'buku'])->name('data-buku');
Route::get('/data-buku/download/{id}', [BukuController::class, 'download_buku'])->name('buku_downloads');
Route::get('/data-buku/download', [FrontController::class, 'coba_download'])->name('cobadulu');

require __DIR__ . '/auth.php';
