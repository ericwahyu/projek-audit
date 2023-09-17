<?php

namespace App\Http\Controllers;

use App\Models\Iso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nav = 'iso';
        $menu = 'iso';
        $auth = Auth::user();
        $data = Iso::all();
        return view('iso.index', compact('nav', 'menu', 'data', 'auth'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'iso';
        $menu = 'iso';
        $auth = Auth::user();
        return view('iso.create', compact('nav', 'menu', 'auth'));
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

        $iso = new Iso();
        $iso->nama = $request->nama;
        $iso->uraian = $request->uraian;
        $iso->save();

        if ($iso) {
            return redirect()->route('index.iso')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('create.iso')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Iso $iso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iso $iso)
    {
        //
        $nav = 'iso';
        $menu = 'iso';
        $auth = Auth::user();
        return view('iso.update', compact('nav', 'menu', 'iso', 'auth'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iso $iso)
    {
        //
        $request->validate([
            'nama' => 'required',
            'uraian' => 'required',
        ]);

        $iso->nama = $request->nama;
        $iso->uraian = $request->uraian;
        $iso->save();

        if ($iso) {
            return redirect()->route('index.iso')->with('success', 'Data Berhasil Di Tambah !!');
        } else {
            return redirect()->route('edit.iso')->with('error', 'Gagal Menambah Data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iso $iso)
    {
        //
        if ($iso) {
            $iso->delete();
            return redirect()->route('index.iso')->with('success', 'Data Berhasil Di Tambah !!');
        }
    }
}
