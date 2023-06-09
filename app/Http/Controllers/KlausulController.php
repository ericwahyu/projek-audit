<?php

namespace App\Http\Controllers;

use App\Models\Iso;
use App\Models\Klausul;
use Illuminate\Http\Request;

class KlausulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nav = 'klausul';
        $menu = 'klausul';
        $data = Klausul::all();
        return view('klausul.index', compact('nav', 'menu', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'klausul';
        $menu = 'klausul';
        $iso = Iso::all();
        return view('klausul.create', compact('nav', 'menu', 'iso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'iso_id' => 'required',
            'nama' => 'required',
            'uraian' => 'required',
        ]);

        $klausul = new Klausul();
        $klausul->iso_id = $request->iso_id;
        $klausul->nama = $request->nama;
        $klausul->uraian = $request->uraian;
        $klausul->save();

        if ($klausul) {
            return redirect()->route('index.klausul')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('create.klausul')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Klausul $klausul)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klausul $klausul)
    {
        //
        $nav = 'klausul';
        $menu = 'klausul';
        $iso = Iso::all();
        return view('klausul.update', compact('nav', 'menu', 'klausul', 'iso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klausul $klausul)
    {
        //
        $request->validate([
            'iso_id' => 'required',
            'nama' => 'required',
            'uraian' => 'required',
        ]);

        $klausul->iso_id = $request->iso_id;
        $klausul->nama = $request->nama;
        $klausul->uraian = $request->uraian;
        $klausul->save();

        if ($klausul) {
            return redirect()->route('index.klausul')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('create.klausul')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klausul $klausul)
    {
        //
        if ($klausul) {
            $klausul->delete();
            return redirect()->route('index.klausul')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('create.klausul')->with('error', 'Gagal Menambah Data !!');
        }
    }
}
