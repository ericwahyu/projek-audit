<?php

namespace App\Http\Controllers;

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
        return view('klausul.create', compact('nav', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'uraian' => 'required',
        ]);

        $klausul = new Klausul();
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
        return view('klausul.update', compact('nav', 'menu', 'klausul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klausul $klausul)
    {
        //
        $request->validate([
            'nama' => 'required',
            'uraian' => 'required',
        ]);

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
