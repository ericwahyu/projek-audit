<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menuRegional = '';
        $regional = Regional::all();
        foreach ($regional as $row) {
            $menuRegional .= '
                <li id="jawa"><a class="nav-link" href='.route('unitSub', $row->id).'>'.$row->nama.'</a></li>';
        }
        $data = array(
            'data_menuRegional'  => $menuRegional,
           );
        echo json_encode($data);
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
    public function show(Regional $regional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regional $regional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regional $regional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regional $regional)
    {
        //
    }
}
