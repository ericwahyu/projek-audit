<?php

use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\UnitSubController;
use Illuminate\Support\Facades\Route;

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
    return view('layout');
});

Route::get('/menuRegional', [RegionalController::class, 'index'])->name('menuRegional');

Route::get('/sub_unit/{regional}', [UnitSubController::class, 'index'])->name('unitSub');

Route::prefix('/pertanyaan')->group(function () {
    Route::get('/', [PertanyaanController::class, 'index'])->name('index.pertanyaan');
    Route::get('/create', [PertanyaanController::class, 'create'])->name('create.pertanyaan');
    Route::post('/store', [PertanyaanController::class, 'store'])->name('store.pertanyaan');
    Route::get('/edit/{pertanyaan}', [PertanyaanController::class, 'edit'])->name('edit.pertanyaan');
    Route::post('/update/{pertanyaan}', [PertanyaanController::class, 'update'])->name('update.pertanyaan');
});

Route::get('/penilaian/{unitSub}', [PenilaianController::class, 'index'])->name('index.penilaian');
Route::get('/penilaian/create/{unitSub}/{pertanyaanIso}', [PenilaianController::class, 'create'])->name('create.penilaian');
Route::post('/penilaian/store/{unitSub}', [PenilaianController::class, 'store'])->name('store.penilaian');
Route::get('/penilaian/edit/{unitSub}/{penilaian}', [PenilaianController::class, 'edit'])->name('edit.penilaian');
Route::post('/penilaian/update/{unitSub}/{penilaian}', [PenilaianController::class, 'update'])->name('update.penilaian');