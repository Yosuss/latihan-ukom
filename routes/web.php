<?php

use App\Http\Controllers\barangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->group( function(){
    Route::get('/',[barangController::class,'listBarang'])->name('listBarang');
    Route::get('/detail{id}',[barangController::class,'detailBarang'])->name('detailBarang');
    Route::get('/tambah',[barangController::class,'tambahBarang'])->name('tambahBarang');
    Route::post('/tambah',[barangController::class,'simpanBarang'])->name('simpanBarang');
    Route::get('/edit{id}',[barangController::class,'editBarang'])->name('editBarang');
    Route::post('/edit{id}',[barangController::class,'updateBarang'])->name('updateBarang');
    Route::delete('/hapus{id}',[barangController::class,'hapusBarang'])->name('hapusBarang');
});