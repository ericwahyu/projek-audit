<?php

namespace App\Http\Controllers;

use App\Models\Klausul;
use App\Models\Objektif;
use App\Models\ObjektifKlausul;
use App\Models\Pertanyaan;
use App\Models\PertanyaanObjektif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        dd($request);
        $objektif = new Objektif();
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

        if($request->klausul_id != null){
            foreach($request->klausul_id as $klausul_id){
                $objektifKlausul =  new ObjektifKlausul();
                $objektifKlausul->objektif_id = $objektif->id;
                $objektifKlausul->klausul_id = $klausul_id;
                $objektifKlausul->save();
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
    public function edit(Objektif $objektif, Request $request)
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

        ObjektifKlausul::where('objektif_id', $objektif->id)->delete();

        if($request->klausul_id != null){
            foreach($request->klausul_id as $klausul_id){
                $objektifKlausul =  new ObjektifKlausul();
                $objektifKlausul->objektif_id = $objektif->id;
                $objektifKlausul->klausul_id = $klausul_id;
                $objektifKlausul->save();
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
        $perObjektif = PertanyaanObjektif::where('objektif_id', $objektif_id)->pluck('pertanyaan_id');

        $arr_pertanyaan = [];
        foreach($perObjektif as $perObjektif_arr){
            array_push($arr_pertanyaan, $perObjektif_arr);
        }
        return $arr_pertanyaan;
    }

    public static function getKlausul($objektif_id){
        $perObjektif = ObjektifKlausul::where('objektif_id', $objektif_id)->pluck('klausul_id');

        $arr_klausul = [];
        foreach($perObjektif as $perObjektif_arr){
            array_push($arr_klausul, $perObjektif_arr);
        }
        return $arr_klausul;
    }

    public function searchKlausul(Request $request){
        if($request->ajax()){
            
            //SEARCH Klausul
            $dataKlausul = '';
            $search = $request->get('query');
            $klausul = Klausul::join('iso' , 'klausul.iso_id', '=', 'iso.id')
                        ->where(function($query) use($search){
                            $query->where('klausul.nama', 'like' , '%'. $search .'%')
                                ->orwhere('klausul.uraian', 'LIKE','%'.$search.'%')
                                ->orwhere('iso.nama', 'LIKE','%'.$search.'%')
                                ->orwhere('iso.uraian', 'LIKE','%'.$search.'%');
                        })
                        ->select('klausul.*')
                        ->get();

            if($klausul->count() > 0){
                $index = 1 ;
                foreach($klausul as $row){
                    $dataKlausul .= '
                        <tr>
                            <td>
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroupK" class="custom-control-input" id="checkboxK-'. $index .'" name="klausul_id[]" value='. $row->id .'>
                                    <label for="checkboxK-'. $index .'" class="custom-control-label">&nbsp;</label>
                                </div>
                            </td>
                            <td>ISO '. $row->iso->nama .'</td>
                            <td>'. $row->iso->uraian .'</td>
                            <td>'. $row->nama .'</td>
                            <td>'. $row->uraian .'</td>
                        </tr>';
                $index++;
                }
            }else{
                $dataKlausul =
                    '<tr>
                        <td align="center" colspan="5">Data tidak ditemukan.</td>
                    </tr>';
            }

            $data = array(
                'table_data_klausul'  => $dataKlausul,
               );
            echo json_encode($data);
        }
    }

    public function searchPertanyaan(Request $request){
        if($request->ajax()){

            //SEARCH Pertanyaan
            $dataPertanyaan = '';
            $search = $request->get('query');
            $pertanyaaan = Pertanyaan::where(function($query) use($search){
                            $query->where('pertanyaan.pertanyaan', 'like' , '%'. $search .'%');
                        })
                        ->get();

            if($pertanyaaan->count() > 0){
                $index = 1 ;
                foreach($pertanyaaan as $row){
                    $dataPertanyaan .= '
                        <tr>
                            <td>
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroupP" class="custom-control-input" id="checkboxP-'. $index .'" name="pertanyaan_id[]" value='. $row->id .'>
                                    <label for="checkboxP-'. $index .'" class="custom-control-label">&nbsp;</label>
                                </div>
                            </td>
                            <td>'. $row->pertanyaan .'</td>
                        </tr>';
                $index++;
                }
            }else{
                $dataPertanyaan =
                    '<tr>
                        <td align="center" colspan="5">Data tidak ditemukan.</td>
                    </tr>';
            }

            $data = array(
                'table_data_pertanyaan'  => $dataPertanyaan,
               );
            echo json_encode($data);
        }
    }
}
