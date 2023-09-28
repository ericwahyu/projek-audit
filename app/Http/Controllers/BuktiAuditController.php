<?php

namespace App\Http\Controllers;

use App\Models\BuktiAudit;
use App\Models\UnitSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class BuktiAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UnitSub $unitSub)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        $data = BuktiAudit::where('unit_sub_id', $unitSub->id)->get();
        return view('bukti-audit.index', compact('nav', 'menu', 'unitSub', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(UnitSub $unitSub)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        return view('bukti-audit.create', compact('nav', 'menu', 'unitSub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('file');
        $file_name = now()->timestamp . '_' . $request->judul . '_file.'. $file->getClientOriginalExtension();
        $file->move(public_path('bukti audit'), $file_name);

        $buktiAudit = new BuktiAudit();
        $buktiAudit->unit_sub_id = $request->unit_sub_id;
        $buktiAudit->judul = $request->judul;
        $buktiAudit->file = $file_name;
        $buktiAudit->deskripsi = $request->deskripsi;
        $buktiAudit->save();

        if($buktiAudit){
            return redirect()->route('index.buktiAudit', $request->unit_sub_id)->with('success', 'Berhasil mengupload data !!');
        }else{
            return redirect()->back()->with('error', 'Gagal mengupload data !!');
        }
    } 

    /**
     * Display the specified resource.
     */
    public function show(BuktiAudit $buktiAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitSub $unitSub, BuktiAudit $buktiAudit)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        return view('bukti-audit.update', compact('nav', 'menu', 'unitSub', 'buktiAudit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BuktiAudit $buktiAudit)
    {
        //
        $request->validate([
            'judul' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg',
            'deskripsi' => 'required',
        ]);

        $buktiAudit->unit_sub_id = $request->unit_sub_id;
        $buktiAudit->judul = $request->judul;
        if ($request->hasFile('file')) {
            //delete file lama
            File::delete(public_path('bukti audit/' . $buktiAudit->file));
            $file = $request->file('file');
            $file_name = now()->timestamp . '_' . $request->judul . '_file.'. $file->getClientOriginalExtension();
            $file->move(public_path('bukti audit'), $file_name);
            $buktiAudit->file = $file_name;
        }
        $buktiAudit->deskripsi = $request->deskripsi;
        $buktiAudit->save();

        if($buktiAudit){
            return redirect()->route('index.buktiAudit', $request->unit_sub_id)->with('success', 'Berhasil mengubah data !!');
        }else{
            return redirect()->back()->with('error', 'Gagal mengubah data !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitSub $unitSub, BuktiAudit $buktiAudit)
    {
        //
        if($buktiAudit){
            File::delete(public_path('bukti audit/' . $buktiAudit->file));
            $buktiAudit->delete();
            return redirect()->route('index.buktiAudit', $unitSub->id)->with('success', 'Berhasil menghapus data !!');
        }else{
            return redirect()->back()->with('error', 'Gagal menghapus data !!');
        }
    }
}
