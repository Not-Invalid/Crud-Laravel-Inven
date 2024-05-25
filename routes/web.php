<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemakaianController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:Admin')->group(function () {
        Route::controller(InventarisController::class)->prefix('inventaris')->group(function () {
            Route::get('', 'index')->name('inventaris.index');
        });

        Route::controller(BarangController::class)->prefix('barang')->group(function () {
            Route::get('', 'index')->name('barang.index');
            Route::get('tambah', 'tambah')->name('barang.tambah');
            Route::post('store', 'store')->name('barang.store');
            Route::get('show/{id}', 'show')->name('barang.show');
            Route::get('ubah/{id}', 'ubah')->name('barang.ubah');
            Route::put('ubah/{id}', 'update')->name('barang.update');
            Route::delete('hapus/{id}', 'hapus')->name('barang.hapus');
            Route::get('cetak', 'cetak')->name('barang.cetak');
        });

        Route::controller(PemakaianController::class)->prefix('pemakaian')->group(function () {
            Route::get('', 'index')->name('pemakaian.index');
            Route::get('tambah', 'tambah')->name('pemakaian.tambah');
            Route::post('store', 'store')->name('pemakaian.store');
            Route::get('show/{id}', 'show')->name('pemakaian.show');
            Route::get('ubah/{id}', 'ubah')->name('pemakaian.ubah');
            Route::put('ubah/{id}', 'update')->name('pemakaian.update');
            Route::delete('hapus/{id}', 'hapus')->name('pemakaian.hapus');
            Route::get('cetak', 'cetak')->name('pemakaian.cetak');
        });

        Route::controller(RuanganController::class)->prefix('ruangan')->group(function () {
            Route::get('', 'index')->name('ruangan.index');
            Route::get('tambah', 'tambah')->name('ruangan.tambah');
            Route::post('store', 'store')->name('ruangan.store');
            Route::get('ubah/{id}', 'ubah')->name('ruangan.ubah');
            Route::put('ubah/{id}', 'update')->name('ruangan.update');
            Route::delete('hapus/{id}', 'hapus')->name('ruangan.hapus');
        });

        Route::controller(JenisBarangController::class)->prefix('jenis_barang')->group(function () {
            Route::get('', 'index')->name('jenis_barang.index');
            Route::get('tambah', 'tambah')->name('jenis_barang.tambah');
            Route::post('store', 'store')->name('jenis_barang.store');
            Route::get('ubah/{id}', 'ubah')->name('jenis_barang.ubah');
            Route::put('ubah/{id}', 'update')->name('jenis_barang.update');
            Route::delete('hapus/{id}', 'hapus')->name('jenis_barang.hapus');
        });
    });

    Route::middleware('role:Operator')->group(function () {
        Route::controller(BarangController::class)->prefix('barang')->group(function () {
            Route::get('', 'index')->name('barang.index');
            Route::get('tambah', 'tambah')->name('barang.tambah');
            Route::post('store', 'store')->name('barang.store');
            Route::get('show/{id}', 'show')->name('barang.show');
            Route::get('ubah/{id}', 'ubah')->name('barang.ubah');
            Route::put('ubah/{id}', 'update')->name('barang.update');
            Route::delete('hapus/{id}', 'hapus')->name('barang.hapus');
        });

        Route::controller(PemakaianController::class)->prefix('pemakaian')->group(function () {
            Route::get('', 'index')->name('pemakaian.index');
            Route::get('tambah', 'tambah')->name('pemakaian.tambah');
            Route::post('store', 'store')->name('pemakaian.store');
            Route::get('show/{id}', 'show')->name('pemakaian.show');
            Route::get('ubah/{id}', 'ubah')->name('pemakaian.ubah');
            Route::put('ubah/{id}', 'update')->name('pemakaian.update');
            Route::delete('hapus/{id}', 'hapus')->name('pemakaian.hapus');
        });
    });

    Route::middleware('role:Petugas')->group(function () {
        Route::controller(PemakaianController::class)->prefix('pemakaian')->group(function () {
            Route::get('', 'index')->name('pemakaian.index');
            Route::get('tambah', 'tambah')->name('pemakaian.tambah');
            Route::post('store', 'store')->name('pemakaian.store');
            Route::get('show/{id}', 'show')->name('pemakaian.show');
            Route::get('ubah/{id}', 'ubah')->name('pemakaian.ubah');
            Route::put('ubah/{id}', 'update')->name('pemakaian.update');
            Route::delete('hapus/{id}', 'hapus')->name('pemakaian.hapus');
        });
    });
});
