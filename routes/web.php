<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//users
Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('/users/{id}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('deleteUsers');

//barang
Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::get('/barang/{id_barang}/delete', [App\Http\Controllers\BarangController::class, 'destroy'])->name('deleteBarang');
Route::get('/cetak_barang', [App\Http\Controllers\BarangController::class, 'cetak_pdf']);

//supplier
Route::resource('supplier', App\Http\Controllers\SupplierController::class);
Route::get('/supplier/{id_supplier}/delete', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('deleteSupplier');
Route::get('/cetak_supplier', [App\Http\Controllers\SupplierController::class, 'cetak_pdf']);

//penjualan
Route::resource('penjualan', App\Http\Controllers\PenjualanController::class);
Route::get('/penjualan/{id_penjualan}/delete', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('deletePenjualan');
Route::get('/cetak_penjualan', [App\Http\Controllers\PenjualanController::class, 'cetak_pdf']);
