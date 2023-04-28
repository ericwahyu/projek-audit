<?php

use App\Http\Controllers\KlausulController;
use App\Http\Controllers\ObjektifController;
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
    return view('blank');
});

Route::get('/menuRegional', [RegionalController::class, 'index'])->name('menuRegional');

Route::get('/sub_unit/{regional}', [UnitSubController::class, 'index'])->name('unitSub');

Route::prefix('/pertanyaan')->group(function () {
    Route::get('/', [PertanyaanController::class, 'index'])->name('index.pertanyaan');
    Route::get('/create', [PertanyaanController::class, 'create'])->name('create.pertanyaan');
    Route::post('/store', [PertanyaanController::class, 'store'])->name('store.pertanyaan');
    Route::get('/edit/{pertanyaan}', [PertanyaanController::class, 'edit'])->name('edit.pertanyaan');
    Route::post('/update/{pertanyaan}', [PertanyaanController::class, 'update'])->name('update.pertanyaan');
    Route::delete('/destroy/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('destroy.pertanyaan');
});

Route::get('/penilaian/{unitSub}', [PenilaianController::class, 'index'])->name('index.penilaian');
Route::get('/penilaian/create/{unitSub}/{pertanyaanIso}', [PenilaianController::class, 'create'])->name('create.penilaian');
Route::post('/penilaian/store/{unitSub}', [PenilaianController::class, 'store'])->name('store.penilaian');
Route::get('/penilaian/edit/{unitSub}/{penilaian}', [PenilaianController::class, 'edit'])->name('edit.penilaian');
Route::post('/penilaian/update/{unitSub}/{penilaian}', [PenilaianController::class, 'update'])->name('update.penilaian');

Route::prefix('/klausul')->group(function (){
    Route::get('/', [KlausulController::class, 'index'])->name('index.klausul');
    Route::get('/create', [KlausulController::class, 'create'])->name('create.klausul');
    Route::post('/store', [KlausulController::class, 'store'])->name('store.klausul');
    Route::get('/edit/{klausul}', [KlausulController::class, 'edit'])->name('edit.klausul');
    Route::post('/update/{klausul}', [KlausulController::class, 'update'])->name('update.klausul');
    Route::delete('/destroy/{klausul}', [KlausulController::class, 'destroy'])->name('destroy.klausul');
});

Route::prefix('/objektif')->group(function (){
    Route::get('/', [ObjektifController::class, 'index'])->name('index.objektif');
    Route::get('/create', [ObjektifController::class, 'create'])->name('create.objektif');
    Route::post('/store', [ObjektifController::class, 'store'])->name('store.objektif');
    Route::get('/edit/{objektif}', [ObjektifController::class, 'edit'])->name('edit.objektif');
    Route::post('/update/{objektif}', [ObjektifController::class, 'update'])->name('update.objektif');
    Route::delete('/destroy/{objektif}', [ObjektifController::class, 'destroy'])->name('destroy.objektif');
});