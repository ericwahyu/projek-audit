<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Iso;
use App\Models\Objektif;
use App\Models\Penilaian;
use App\Models\Pertanyaan;
use App\Models\PertanyaanDepartemen;
use App\Models\PertanyaanIso;
use App\Models\PertanyaanObjektif;
use App\Models\UnitSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nav = 'pertanyaan';
        $menu = 'pertanyaan';
        $data = Pertanyaan::all();
        // $isoCount = Iso::count();
        return view('pertanyaan.index', compact('nav', 'menu', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'pertanyaan';
        $menu = 'pertanyaan';
        return view('pertanyaan.create', compact('nav', 'menu'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pertanyaan' => 'required',
            // 'iso' => 'required',
        ]);
        
        // dd($request);
        $pertanyaan = new Pertanyaan();
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();

        if(true){
            return redirect()->route('index.pertanyaan')->with('success', 'Data berhasil di tambah !!');
        }else{
            return redirect()->route('create.pertanyaan')->with('error', 'Gagal menambah data !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        //
        $nav = 'pertanyaan';
        $menu = 'pertanyaan';
        return view('pertanyaan.update', compact('nav', 'menu', 'pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        //
        $request->validate([
            'pertanyaan' => 'required'
        ]);

        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save();
        
        if($pertanyaan){
            return redirect()->route('index.pertanyaan')->with('success', 'Data berhasil di ubah !!');
        }else{
            return redirect()->route('update.pertanyaan')->with('error', 'Gagal mengubah data !!');
        }
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        //
        if($pertanyaan){
            $pertanyaan->delete();
            return redirect()->route('index.pertanyaan')->with('success', 'Data berhasil di hapus !!');
        }else{
            return redirect()->route('index.pertanyaan')->with('error', 'Gagal menghapus data !!');
        }
    }
}
