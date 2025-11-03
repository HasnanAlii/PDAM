<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CekTagihanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');


Route::get('/dashboard', [BerandaController::class, 'admin'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::get('/berita/filter', [BeritaController::class, 'filter'])->name('berita.filter');
    Route::get('/partner-view', [PartnerController::class, 'tampil'])->name('beranda.partner');

    Route::get('/cek-tagihan', [CekTagihanController::class, 'index'])->name('cektagihan.index');
    Route::post('/cek-tagihan', [CekTagihanController::class, 'cek'])->name('cektagihan.cek');

    Route::get('/simulasi', [SimulasiController::class, 'index'])->name('simulasi.index');
    Route::post('/simulasi/hitung', [SimulasiController::class, 'hitung'])->name('simulasi.hitung');

    Route::get('/tentangkami', [TentangKamiController::class, 'index'])->name('tentangkami.index'); 

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

    Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/{gallery}', [GalleryController::class, 'detail'])->name('galeri.detail');



Route::middleware('auth')->group(function () {
    Route::get('/tentangkami/edit', [TentangKamiController::class, 'edit'])->name('tentangkami.edit');
    Route::post('/tentangkami/update', [TentangKamiController::class, 'update'])->name('tentangkami.update');
    Route::get('/partner', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('/partner/create', [PartnerController::class, 'create'])->name('partner.create');
    Route::post('/partner', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/partner/{partner}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
    Route::patch('/partner/{partner}', [PartnerController::class, 'update'])->name('partner.update');
    Route::delete('/partner/{partner}', [PartnerController::class, 'destroy'])->name('partner.destroy');

    Route::get('/beritas', [BeritaController::class, 'admin'])->name('admin.berita.index');
    Route::get('/beritas/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/beritas', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/beritas/{berita}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::patch('/beritas/{berita}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/beritas/{berita}', [BeritaController::class, 'destroy'])->name('berita.destroy');


    Route::get('/galeries', [GalleryController::class, 'admin'])->name('admin.galeri.index');
    Route::get('/galeries/create', [GalleryController::class, 'create'])->name('admin.galeri.create');
    Route::post('/galeries', [GalleryController::class, 'store'])->name('admin.galeri.store');
    Route::get('/galeries/{galeri}', [GalleryController::class, 'show'])->name('admin.galeri.show');
    Route::get('/galeries/{galeri}/edit', [GalleryController::class, 'edit'])->name('admin.galeri.edit');
    Route::patch('/galeries/{galeri}', [GalleryController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/galeries/{galeri}', [GalleryController::class, 'destroy'])->name('admin.galeri.destroy');


    Route::get('/tentang-kami', [TentangKamiController::class, 'admin'])->name('admin.tentang.index');
    Route::get('/tentang-kami/create', [TentangKamiController::class, 'create'])->name('admin.tentang.create');
    Route::post('/tentang-kami', [TentangKamiController::class, 'store'])->name('admin.tentang.store');
    Route::get('/tentang-kami/{tentangKami}/edit', [TentangKamiController::class, 'edit'])->name('admin.tentang.edit');
    Route::put('/tentang-kami/{tentangKami}', [TentangKamiController::class, 'update'])->name('admin.tentang.update');
    Route::delete('/tentang-kami/{tentangKami}', [TentangKamiController::class, 'destroy'])->name('admin.tentang.destroy');

    Route::get('/partners', [PartnerController::class, 'admin'])->name('admin.partner.index');
    Route::get('/partners/create', [PartnerController::class, 'create'])->name('admin.partner.create');
    Route::post('/partners', [PartnerController::class, 'store'])->name('admin.partner.store');
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('admin.partner.edit');
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('admin.partner.update');
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('admin.partner.destroy');

    Route::get('/simulasions', [SimulasiController::class, 'admin'])->name('simulasion.index');
    Route::get('/simulasions/create', [SimulasiController::class, 'create'])->name('simulasion.create');
    Route::post('/simulasions', [SimulasiController::class, 'store'])->name('simulasion.store');
    Route::get('/simulasions/{simulasi}/edit', [SimulasiController::class, 'edit'])->name('simulasion.edit');
    Route::put('/simulasions/{simulasi}', [SimulasiController::class, 'update'])->name('simulasion.update');
    Route::delete('/simulasions/{simulasi}', [SimulasiController::class, 'destroy'])->name('simulasion.destroy');
});
require __DIR__.'/auth.php';
