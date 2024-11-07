<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PelanganController;
use App\Http\Controllers\Dashboard\ProdukController;
use App\Http\Controllers\Dashboard\PenjualanController;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
  'prefix' => '/dashboard',
  'as' => 'dashboard.'
  ], function(){
    
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/pelangan', PelanganController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/penjualan', [PenjualanController::class,
    'index'])->name('penjualan.index');
    Route::post('/penjualan/create', [PenjualanController::class,
    'create'])->name('penjualan.create');
    Route::get('/penjualan/detail/create/{id}', [PenjualanController::class,
    'detailCreate'])->name('penjualan.detail.create');
    Route::post('/penjualan/detail/store/', [PenjualanController::class,
    'detailStore'])->name('penjualan.detail.store');
    Route::post('/penjualan/store/', [PenjualanController::class,
    'store'])->name('penjualan.store');
    Route::delete('/penjualan/destroy/{id}', [PenjualanController::class,
    'destroy'])->name('penjualan.destroy');
  });
