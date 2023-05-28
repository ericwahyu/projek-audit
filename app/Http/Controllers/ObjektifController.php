<?php

namespace App\Http\Controllers;

use App\Models\Klausul;
use App\Models\Objektif;
use App\Models\Pertanyaan;
use App\Models\PertanyaanObjektif;
use Illuminate\Http\Request;

class ObjektifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nav = 'objektif';
        $menu = 'objektif';
        $data = Objektif::all();
        return view('objektif.index', compact('nav', 'menu', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'objektif';
        $menu = 'objektif';
        $klausul = Klausul::all();
        $pertanyaan = Pertanyaan::all();
        return view('objektif.create', compact('nav', 'menu', 'klausul', 'pertanyaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'objektif' => 'required',
            'klausul_id' => 'required',
            'pertanyaan_id' => 'required',
        ]);

        $objektif = new Objektif();
        $objektif->klausul_id = $request->klausul_id;
        $objektif->objektif = $request->objektif;
        $objektif->save();

        if($request->pertanyaan_id != null){
            foreach($request->pertanyaan_id as $pertanyaan_id){
                $PertanyaanObjektif =  new PertanyaanObjektif();
                $PertanyaanObjektif->objektif_id = $objektif->id;
                $PertanyaanObjektif->pertanyaan_id = $pertanyaan_id;
                $PertanyaanObjektif->save();
            }
        }

        if($objektif){
            return redirect()->route('index.objektif')->with('success', 'Data Berhasil Di Tambah !!');
        }else{
            return redirect()->route('create.objektif')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Objektif $objektif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objektif $objektif)
    {
        //
        $nav = 'objektif';
        $menu = 'objektif';
        $klausul = Klausul::all();
        $pertanyaan = Pertanyaan::all();
        return view('objektif.update', compact('nav', 'menu', 'klausul', 'objektif', 'pertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Objektif $objektif)
    {
        //
        $request->validate([
            'klausul_id' => 'required',
            'objektif' => 'required',
        ]);

        $objektif->klausul_id = $request->klausul_id;
        $objektif->objektif = $request->objektif;
        $objektif->save();

        PertanyaanObjektif::where('objektif_id', $objektif->id)->delete();

        if($request->pertanyaan_id != null){
            foreach($request->pertanyaan_id as $pertanyaan_id){
                $pertanyaanObjektif =  new PertanyaanObjektif();
                $pertanyaanObjektif->objektif_id = $objektif->id;
                $pertanyaanObjektif->pertanyaan_id = $pertanyaan_id;
                $pertanyaanObjektif->save();
            }
        }


        if($objektif){
            return redirect()->route('index.objektif')->with('success', 'Data Berhasil Di Tambah !!');
        }else{
            return redirect()->route('edit.objektif')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objektif $objektif)
    {
        //
        if($objektif){
            $objektif->delete();
            return redirect()->route('index.objektif')->with('success', 'Data Berhasil Di Tambah !!');
        }else{
            return redirect()->route('index.objektif')->with('error', 'Gagal Menambah Data !!');
        }
    }

    public static function getPertanyaan($objektif_id){
        $perObjektif = PertanyaanObjektif::where('pertanyaan_objektif.objektif_id', $objektif_id)->pluck('pertanyaan_objektif.pertanyaan_id');

        $arr_pertanyaan = [];
        foreach($perObjektif as $perObjektif_arr){
            array_push($arr_pertanyaan, $perObjektif_arr);
        }
        return $arr_pertanyaan;
    }
}
