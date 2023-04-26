<?php

namespace App\Http\Controllers;

use App\Models\Iso;
use App\Models\Nilai;
use App\Models\Objektif;
use App\Models\Penilaian;
use App\Models\PertanyaanIso;
use App\Models\Regional;
use App\Models\UnitSub;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UnitSub $unitSub)
    {
        //
        $nav = 'regional';
        $menu = $unitSub->regional->nama;
        $iso =  Iso::all();
        $penilaian = Penilaian::all();
        return view('penilaian.index', compact('nav', 'menu', 'unitSub', 'iso', 'penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UnitSub $unitSub, PertanyaanIso $pertanyaanIso)
    {
        //
        $nav = 'regional';
        $menu = $unitSub->regional->nama;
        $nilai = Nilai::all();
        return view('penilaian.create', compact('nav', 'menu', 'unitSub', 'pertanyaanIso', 'nilai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitSub $unitSub, Request $request)
    {
        //
        $request->validate([
            'nilai_id' => 'required',
        ]);
        
        $penilaian = new Penilaian();
        $penilaian->pertanyaan_iso_id = $request->pertanyaan_iso_id;
        $penilaian->unit_sub_id = $unitSub->id;
        $penilaian->nilai_id = $request->nilai_id;
        $penilaian->catatan = $request->catatan;
        $penilaian->save();

        if($request->objektif != null){
            foreach($request->objektif as $insObjektif){
                $objektif = new Objektif();
                $objektif->penilaian_id = $penilaian->id;
                $objektif->objektif = $insObjektif;
                $objektif->save();
            }
        }
        
        if($penilaian){
            return redirect()->route('index.penilaian', $unitSub->id)->with('success', 'Data berhasil di tambah !!');
        }else{
            return redirect()->route('create.penilaian', [$unitSub->id, $request->pertanyaan_iso_id])->with('error', 'Gagal menambah data !!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitSub $unitSub, Penilaian $penilaian)
    {
        //
        $nav = 'regional';
        $menu = $unitSub->regional->nama;
        $nilai = Nilai::all();
        $objektif = Objektif::where('penilaian_id', $penilaian->id)->get();
        return view('penilaian.update', compact('nav', 'menu', 'unitSub', 'penilaian', 'nilai', 'objektif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitSub $unitSub, Penilaian $penilaian)
    {
        //
        $request->validate([
            'nilai_id' => 'required',
        ]);
        
        $penilaian->nilai_id = $request->nilai_id;
        $penilaian->catatan = $request->catatan;
        $penilaian->save();

        if($request->objektif != null){
            Objektif::where('penilaian_id', $penilaian->id)->delete();
            foreach($request->objektif as $insObjektif){
                $objektif = new Objektif();
                $objektif->penilaian_id = $penilaian->id;
                $objektif->objektif = $insObjektif;
                $objektif->save();
            }
        }
        if($penilaian){
            return redirect()->route('index.penilaian', $unitSub->id)->with('success', 'Data berhasil di tambah !!');
        }else{
            return redirect()->route('edit.penilaian', [$unitSub->id, $request->pertanyaan_iso_id])->with('error', 'Gagal menambah data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }

    public static function getPenilaian($unit_sub_id, $pertanyaan_iso_id){
        $penilaian = Penilaian::where('penilaian.unit_sub_id', $unit_sub_id)
        ->where('penilaian.pertanyaan_iso_id', $pertanyaan_iso_id)->get();
        // dd($penilaian);
        // $penilaian = Penilaian::all();
        return $penilaian;
    }
}
