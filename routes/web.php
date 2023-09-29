<?php

use App\Http\Controllers\BuktiAuditController;
use App\Http\Controllers\IsoController;
use App\Http\Controllers\KlausulController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\ObjektifController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UnitSubController;
use App\Models\UnitSub;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/user-login', [LoginController::class, 'index'])->name('index.login');
Route::post('/store-login', [LoginController::class, 'store'])->name('store.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.login');

Route::group(['middleware' => ['auth']], function () {

    
    Route::prefix('/master-admin')->group(function () {
        Route::get('/', [MasterUserController::class, 'index'])->name('index.masterUser')->middleware('checkRole:admin');
        Route::get('/create', [MasterUserController::class, 'create'])->name('create.masterUser')->middleware('checkRole:admin');
        Route::post('/store', [MasterUserController::class, 'store'])->name('store.masterUser')->middleware('checkRole:admin');
        Route::get('/edit/{user}', [MasterUserController::class, 'edit'])->name('edit.masterUser')->middleware('checkRole:admin');
        Route::post('/update/{user}', [MasterUserController::class, 'update'])->name('update.masterUser')->middleware('checkRole:admin');
        Route::delete('/destroy/{user}', [MasterUserController::class, 'destroy'])->name('destroy.masterUser')->middleware('checkRole:admin');
    });

    Route::prefix('/iso')->group(function () {
        Route::get('/', [IsoController::class, 'index'])->name('index.iso');
        Route::get('/create', [IsoController::class, 'create'])->name('create.iso')->middleware('checkRole:admin');
        Route::post('/store', [IsoController::class, 'store'])->name('store.iso')->middleware('checkRole:admin');
        Route::get('/edit/{iso}', [IsoController::class, 'edit'])->name('edit.iso')->middleware('checkRole:admin');
        Route::post('/update/{iso}', [IsoController::class, 'update'])->name('update.iso')->middleware('checkRole:admin');
        Route::delete('/destroy/{iso}', [IsoController::class, 'destroy'])->name('destroy.iso')->middleware('checkRole:admin');
    });
    
    Route::prefix('/pertanyaan')->group(function () {
        Route::get('/', [PertanyaanController::class, 'index'])->name('index.pertanyaan')->middleware('checkRole:admin');
        Route::get('/create', [PertanyaanController::class, 'create'])->name('create.pertanyaan')->middleware('checkRole:admin');
        Route::post('/store', [PertanyaanController::class, 'store'])->name('store.pertanyaan')->middleware('checkRole:admin');
        Route::get('/edit/{pertanyaan}', [PertanyaanController::class, 'edit'])->name('edit.pertanyaan')->middleware('checkRole:admin');
        Route::post('/update/{pertanyaan}', [PertanyaanController::class, 'update'])->name('update.pertanyaan')->middleware('checkRole:admin');
        Route::delete('/destroy/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('destroy.pertanyaan')->middleware('checkRole:admin');
    });
    
    Route::prefix('/klausul')->group(function () {
        Route::get('/', [KlausulController::class, 'index'])->name('index.klausul');
        Route::get('/create', [KlausulController::class, 'create'])->name('create.klausul')->middleware('checkRole:admin');
        Route::post('/store', [KlausulController::class, 'store'])->name('store.klausul')->middleware('checkRole:admin');
        Route::get('/edit/{klausul}', [KlausulController::class, 'edit'])->name('edit.klausul')->middleware('checkRole:admin');
        Route::post('/update/{klausul}', [KlausulController::class, 'update'])->name('update.klausul')->middleware('checkRole:admin');
        Route::delete('/destroy/{klausul}', [KlausulController::class, 'destroy'])->name('destroy.klausul')->middleware('checkRole:admin');
    });
    
    Route::prefix('/objektif')->group(function () {
        Route::get('/', [ObjektifController::class, 'index'])->name('index.objektif')->middleware('checkRole:admin');
        Route::get('/create', [ObjektifController::class, 'create'])->name('create.objektif')->middleware('checkRole:admin');
        Route::post('/store', [ObjektifController::class, 'store'])->name('store.objektif')->middleware('checkRole:admin');
        Route::get('/edit/{objektif}', [ObjektifController::class, 'edit'])->name('edit.objektif')->middleware('checkRole:admin');
        Route::post('/update/{objektif}', [ObjektifController::class, 'update'])->name('update.objektif')->middleware('checkRole:admin');
        Route::delete('/destroy/{objektif}', [ObjektifController::class, 'destroy'])->name('destroy.objektif')->middleware('checkRole:admin');
    });

    Route::get('/search-klausul', [ObjektifController::class, 'searchKlausul'])->name('searchKlausul');
    Route::get('/search-pertanyaan', [ObjektifController::class, 'searchPertanyaan'])->name('searchPertanyaan');
    
    
    Route::prefix('/penilaian')->group(function () {
        Route::get('/index/{unitSub}', [PenilaianController::class, 'index'])->name('index.penilaian')->middleware('checkRole:auditor');
        Route::get('/create/{unitSub}/{pertanyaan}', [PenilaianController::class, 'create'])->name('create.penilaian')->middleware('checkRole:auditor');
        Route::post('/store/{unitSub}', [PenilaianController::class, 'store'])->name('store.penilaian')->middleware('checkRole:auditor');
        Route::get('/edit/{unitSub}/{penilaian}', [PenilaianController::class, 'edit'])->name('edit.penilaian')->middleware('checkRole:auditor');
        Route::post('/update/{penilaian}', [PenilaianController::class, 'update'])->name('update.penilaian')->middleware('checkRole:auditor');
        Route::delete('/destroy/{penilaian}/{unitSub}', [PenilaianController::class, 'destroy'])->name('destroy.penilaian')->middleware('checkRole:auditor');
    });

    Route::prefix('/bukti-audit')->group(function () {
       
        Route::get('/create/{unitSub}', [BuktiAuditController::class, 'create'])->name('create.buktiAudit')->middleware('checkRole:auditor');
        Route::post('/store', [BuktiAuditController::class, 'store'])->name('store.buktiAudit')->middleware('checkRole:auditor');
        Route::get('/edit/{unitSub}/{buktiAudit}', [BuktiAuditController::class, 'edit'])->name('edit.buktiAudit')->middleware('checkRole:auditor');
        Route::post('/update/{buktiAudit}', [BuktiAuditController::class, 'update'])->name('update.buktiAudit')->middleware('checkRole:auditor');
        Route::delete('/destroy/{unitSub}/{buktiAudit}', [BuktiAuditController::class, 'destroy'])->name('destroy.buktiAudit')->middleware('checkRole:auditor');
    });
});

Route::get('/', function () {
    $countUser = User::all();
    $countKantorRegional3 = UnitSub::where('regional_id', 1)->get();
    $countKantorRegionalJawa = UnitSub::where('regional_id', 2)->get();
    $countKantorRegionalKalimantan = UnitSub::where('regional_id', 3)->get();
    $countKantorRegionalBaliNusra = UnitSub::where('regional_id', 4)->get();
    // dd(count($countKantorRegional3));
    return view('dashboard', array(
        'countUser' => count($countUser),
        'countKantorRegional3' => count($countKantorRegional3),
        'countKantorRegionalJawa' => count($countKantorRegionalJawa),
        'countKantorRegionalKalimantan' => count($countKantorRegionalKalimantan),
        'countKantorRegionalBaliNusra' => count($countKantorRegionalBaliNusra),
        'nav' => 'dashboard',
        'menu' => 'dashboard',
    ));})->name('dashboard');

Route::get('/penilaian/sub_unit/{regional}', [UnitSubController::class, 'index'])->name('index.unitSub');
Route::get('/penilaian/detail-scoring/{unitSub}', [PenilaianController::class, 'detailScoring'])->name('detail.penilaian');
Route::get('/bukti-audit/{unitSub}', [BuktiAuditController::class, 'index'])->name('index.buktiAudit');

