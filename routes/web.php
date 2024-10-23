<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\AdminCon;
use App\Http\Controllers\admin\SKMCon;

// Route home (sementara)
Route::redirect('/', 'admin', 301);

// Route Admin
Route::prefix('admin')->group(function () {
    Route::controller(AdminCon::class)->group(function () {
        Route::get('/', 'home')->name('admin.home');
    });

    // Route SKM
    Route::prefix('skm')->group(function () {
        Route::controller(SKMCon::class)->group(function () {
            Route::get('/', 'index')->name('admin.skm');

            // Route data unit layanan dan layanan
            Route::prefix('kelola-data-layanan')->group(function () {
                Route::get('/', 'kelolaDataLayanan')->name('admin.skm.kelolaDataLayanan');
                
                Route::post('unit-layanan', 'tambahUnitLayanan')->name('admin.skm.tambahUnitLayanan');
                Route::put('unit-layanan', 'updateUnitLayanan')->name('admin.skm.updateUnitLayanan');
                Route::delete('unit-layanan', 'hapusUnitLayanan')->name('admin.skm.hapusUnitLayanan');
                
                Route::post('layanan', 'tambahLayanan')->name('admin.skm.tambahLayanan');
                Route::put('layanan', 'updateLayanan')->name('admin.skm.updateLayanan');
                Route::delete('layanan', 'hapusLayanan')->name('admin.skm.hapusLayanan');
            });

            // Route data unsur dan pertanyaan
            Route::prefix('kelola-data-pertanyaan')->group(function () {
                Route::get('/', 'kelolaDataPertanyaan')->name('admin.skm.kelolaDataPertanyaan');

                Route::post('unsur', 'tambahUnsur')->name('admin.skm.tambahUnsur');
                Route::put('unsur', 'updateUnsur')->name('admin.skm.updateUnsur');
                Route::delete('unsur', 'hapusUnsur')->name('admin.skm.hapusUnsur');

                Route::post('pertanyaan', 'tambahPertanyaan')->name('admin.skm.tambahPertanyaan');
                Route::put('pertanyaan', 'updatePertanyaan')->name('admin.skm.updatePertanyaan');
                Route::delete('pertanyaan', 'hapusPertanyaan')->name('admin.skm.hapusPertanyaan');
            });

            // Route simulasi
            Route::prefix('simulasi')->group(function () {
                Route::get('/', 'simulasi')->name('admin.skm.simulasi');
                Route::post('/', 'simpanDataSKM')->name('admin.skm.simpanDataSKM');
                Route::delete('/', 'hapusHasilSKM')->name('admin.skm.hapusHasilSKM');
            });

            // Route buat laporan SKM
            Route::post('buat-laporan', 'buatLaporanSKM')->name('admin.skm.buatLaporanSKM');
        });
    });
});