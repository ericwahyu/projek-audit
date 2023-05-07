<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Regional;
use App\Models\UnitSub;
use Illuminate\Http\Request;

class UnitSubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Regional $regional)
    {
        //
        $nav = 'score';
        $menu = $regional->nama;
        $data = UnitSub::where('regional_id', $regional->id)->get();
        // $data = Penilaian::all();

        return view('unit-sub/index', compact('nav', 'menu', 'data'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitSub $unitSub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitSub $unitSub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitSub $unitSub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitSub $unitSub)
    {
        //
    }
}
