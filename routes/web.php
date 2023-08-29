<?php

use App\Http\Controllers\IsoController;
use App\Http\Controllers\KlausulController;
use App\Http\Controllers\ObjektifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PertanyaanController;
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

Route::get('/login', function () {return view('login');});



Route::prefix('/iso')->group(function () {
    Route::get('/', [IsoController::class, 'index'])->name('index.iso');
    Route::get('/create', [IsoController::class, 'create'])->name('create.iso');
    Route::post('/store', [IsoController::class, 'store'])->name('store.iso');
    Route::get('/edit/{iso}', [IsoController::class, 'edit'])->name('edit.iso');
    Route::post('/update/{iso}', [IsoController::class, 'update'])->name('update.iso');
    Route::delete('/destroy/{iso}', [IsoController::class, 'destroy'])->name('destroy.iso');
});

Route::prefix('/pertanyaan')->group(function () {
    Route::get('/', [PertanyaanController::class, 'index'])->name('index.pertanyaan');
    Route::get('/create', [PertanyaanController::class, 'create'])->name('create.pertanyaan');
    Route::post('/store', [PertanyaanController::class, 'store'])->name('store.pertanyaan');
    Route::get('/edit/{pertanyaan}', [PertanyaanController::class, 'edit'])->name('edit.pertanyaan');
    Route::post('/update/{pertanyaan}', [PertanyaanController::class, 'update'])->name('update.pertanyaan');
    Route::delete('/destroy/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('destroy.pertanyaan');
});

Route::prefix('/klausul')->group(function () {
    Route::get('/', [KlausulController::class, 'index'])->name('index.klausul');
    Route::get('/create', [KlausulController::class, 'create'])->name('create.klausul');
    Route::post('/store', [KlausulController::class, 'store'])->name('store.klausul');
    Route::get('/edit/{klausul}', [KlausulController::class, 'edit'])->name('edit.klausul');
    Route::post('/update/{klausul}', [KlausulController::class, 'update'])->name('update.klausul');
    Route::delete('/destroy/{klausul}', [KlausulController::class, 'destroy'])->name('destroy.klausul');
});

Route::prefix('/objektif')->group(function () {
    Route::get('/', [ObjektifController::class, 'index'])->name('index.objektif');
    Route::get('/create', [ObjektifController::class, 'create'])->name('create.objektif');
    Route::post('/store', [ObjektifController::class, 'store'])->name('store.objektif');
    Route::get('/edit/{objektif}', [ObjektifController::class, 'edit'])->name('edit.objektif');
    Route::post('/update/{objektif}', [ObjektifController::class, 'update'])->name('update.objektif');
    Route::delete('/destroy/{objektif}', [ObjektifController::class, 'destroy'])->name('destroy.objektif');
});


Route::prefix('/penilaian')->group(function () {
    Route::get('/sub_unit/{regional}', [UnitSubController::class, 'index'])->name('index.unitSub');
    Route::get('/index/{unitSub}', [PenilaianController::class, 'index'])->name('index.penilaian');
    Route::get('/create/{unitSub}/{pertanyaan}', [PenilaianController::class, 'create'])->name('create.penilaian');
    Route::post('/store/{unitSub}', [PenilaianController::class, 'store'])->name('store.penilaian');
    Route::get('/edit/{unitSub}/{penilaian}', [PenilaianController::class, 'edit'])->name('edit.penilaian');
    Route::post('/update/{penilaian}', [PenilaianController::class, 'update'])->name('update.penilaian');
    Route::delete('/destroy/{penilaian}/{unitSub}', [PenilaianController::class, 'destroy'])->name('destroy.penilaian');

    Route::get('/total/{unitSub}', [PenilaianController::class, 'total'])->name('total.penilaian');

    Route::get('/getFunction/getDepartemen', [PenilaianController::class, 'getDepartemen'])->name('getDepartemen');
    Route::get('/getFunction/getPertanyaanDepartemen', [PenilaianController::class, 'getPertanyaanDepartemen'])->name('getPertanyaanDepartemen');
    Route::get('/getFunction/getScoring', [PenilaianController::class, 'getScoring'])->name('getScoring');
});
// Route::get('/penilaian/create/{unitSub}/{pertanyaanIso}', [PenilaianController::class, 'create'])->name('create.penilaian');
// Route::get('/penilaian/edit/{unitSub}/{penilaian}', [PenilaianController::class, 'edit'])->name('edit.penilaian');
// Route::post('/penilaian/update/{unitSub}/{penilaian}', [PenilaianController::class, 'update'])->name('update.penilaian');
