<?php

namespace App\Http\Controllers;

use App\Models\Iso;
use App\Models\Objektif;
use App\Models\Pertanyaan;
use App\Models\PertanyaanIso;
use App\Models\PertanyaanObjektif;
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
        $isoCount = Iso::count();
        return view('pertanyaan.index', compact('nav', 'menu', 'data', 'isoCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'pertanyaan';
        $menu = 'pertanyaan';
        $iso = Iso::all();
        $objektif = Objektif::all();
        return view('pertanyaan.create', compact('nav', 'menu', 'iso', 'objektif'));

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
        
        if($request->iso != null){
            foreach($request->iso as $req_iso){
                $iso =  new PertanyaanIso();
                $iso->iso_id = $req_iso;
                $iso->pertanyaan_id = $pertanyaan->id;
                $iso->save();
            }
        }

        if($request->objektif != null){
            foreach($request->objektif as $req_obj){
                $objektif =  new PertanyaanObjektif();
                $objektif->objektif_id = $req_obj;
                $objektif->pertanyaan_id = $pertanyaan->id;
                $objektif->save();
            }
        }

        if($pertanyaan){
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
        $iso = Iso::all();
        $objektif = Objektif::all();
        return view('pertanyaan.update', compact('nav', 'menu', 'pertanyaan', 'iso', 'objektif'));
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

        PertanyaanIso::where('pertanyaan_id', $pertanyaan->id)->delete();

        if($request->iso != null){
            foreach($request->iso as $req_iso){
                $iso =  new PertanyaanIso();
                $iso->iso_id = $req_iso;
                $iso->pertanyaan_id = $pertanyaan->id;
                $iso->save();
            }
        }

        PertanyaanObjektif::where('pertanyaan_id', $pertanyaan->id)->delete();

        if($request->objektif != null){
            foreach($request->objektif as $req_obj){
                $objektif =  new PertanyaanObjektif();
                $objektif->objektif_id = $req_obj;
                $objektif->pertanyaan_id = $pertanyaan->id;
                $objektif->save();
            }
        }
        
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

    //get iso from quetions
    public static function getPertanyaanIso($pertanyaan_id){
        $iso = PertanyaanIso::join('iso', 'pertanyaan_iso.iso_id', '=', 'iso.id')
        ->where('pertanyaan_iso.pertanyaan_id', $pertanyaan_id)->pluck('iso.id');

        $arr_iso = [];
        foreach($iso as $iso_arr){
            array_push($arr_iso, $iso_arr);
        }
        return $arr_iso;
    }

    public static function getPertanyaanObjektif($pertanyaan_id){
        $pertanyaanObjektif = PertanyaanObjektif::join('objektif', 'pertanyaan_objektif.objektif_id', '=', 'objektif.id')
        ->where('pertanyaan_objektif.pertanyaan_id', $pertanyaan_id)->pluck('objektif.id');

        $arr_objektif = [];
        foreach($pertanyaanObjektif as $iso_arr){
            array_push($arr_objektif, $iso_arr);
        }
        return $arr_objektif;
    }
}
