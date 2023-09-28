<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Iso;
use App\Models\Nilai;
use App\Models\Penilaian;
use App\Models\Pertanyaan;
use App\Models\PertanyaanObjektif;
use App\Models\Regional;
use App\Models\UnitSub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, UnitSub $unitSub)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        $divisi = Divisi::where('regional_id', $unitSub->regional->id)->get();
        $iso = Iso::all();
        $getNilai = Nilai::all();
        $penilaian = Penilaian::join('pertanyaan', 'penilaian.pertanyaan_id', '=', 'pertanyaan.id')
                        ->join('pertanyaan_objektif', 'pertanyaan.id', '=', 'pertanyaan_objektif.pertanyaan_id')
                        ->join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                        ->join('objektif_klausul', 'objektif.id', '=', 'objektif_klausul.objektif_id')
                        ->join('klausul', 'klausul.id', '=', 'objektif_klausul.klausul_id')
                        ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                        ->when($request->iso_id, function ($query) use ($request) {
                            // $query->where('category_id', $request->category_id);
                            $query->where('iso.id', $request->iso_id);
                        })
                        ->where('penilaian.unit_sub_id', $unitSub->id)
                        ->select('penilaian.*')
                        ->distinct()->get();

        //
        // dd($penilaian);
        $arrPenilaian = Penilaian::where('unit_sub_id', $unitSub->id)->pluck('pertanyaan_id');

        $arr_pertanyaan = [];
        foreach($arrPenilaian as $arr_penilaian){
            array_push($arr_pertanyaan, $arr_penilaian);
        }

        $pertanyaan = Pertanyaan::
                        join('pertanyaan_objektif', 'pertanyaan.id', '=', 'pertanyaan_objektif.pertanyaan_id')
                        ->join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                        ->join('objektif_klausul', 'objektif.id', '=', 'objektif_klausul.objektif_id')
                        ->join('klausul', 'klausul.id', '=', 'objektif_klausul.klausul_id')
                        ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                        ->when($request->iso_id, function ($query) use ($request) {
                            // $query->where('category_id', $request->category_id);
                            $query->where('iso.id', $request->iso_id);
                        })
                        ->when($arr_pertanyaan != null, function($query) use ($arr_pertanyaan){
                            for ($i=0; $i < count($arr_pertanyaan); $i++) { 
                                # code...
                                    $query->whereNot('pertanyaan.id', $arr_pertanyaan[$i]);
                            }
                        })
                        ->select('pertanyaan.*')
                        ->distinct()->get();
        // dd($pertanyaan);
        return view('penilaian.index', compact('nav','menu', 'divisi', 'unitSub', 'getNilai', 'penilaian', 'pertanyaan', 'iso', 'request'));
    }

    // public function getScoring(Request $request){
    //     if($request->ajax()){
    //         $departemen_id = $request->get('departemen_id');
    //         $unit_sub_id = $request->get('unit_sub_id');
    //         $data_table ='';
    //         $penilaian = Penilaian::join('pertanyaan_departemen', 'penilaian.pertanyaan_departemen_id', '=', 'pertanyaan_departemen.id')
    //                     ->where('pertanyaan_departemen.departemen_id', $departemen_id)
    //                     ->where('penilaian.unit_sub_id', $unit_sub_id)->select('penilaian.*')
    //                     ->get();

    //         $query = Penilaian::join('nilai', 'nilai.id', '=', 'penilaian.nilai_id')
    //                 ->join('pertanyaan_departemen', 'pertanyaan_departemen.id', '=', 'penilaian.pertanyaan_departemen_id')
    //                 ->where('penilaian.unit_sub_id', $unit_sub_id)
    //                 ->where('pertanyaan_departemen.departemen_id', $departemen_id)->get();

    //         $getMA = $query->where('nilai.id', 1);
    //         $getMI = $query->where('nilai.id', 2);
    //         $getOBS = $query->where('nilai.id', 3);
    //         $getOK = $query->where('nilai.id', 4);
    //         $getIMP = $query->where('nilai.id', 5);
    //         $subTotal = $query->sum('nilai.score');
    //         $subTotalPersentase = $subTotal / ($penilaian->count() * 4) * 100; 
            
    //         if($penilaian->count() > 0){
    //             $loop = 1;
    //             foreach($penilaian as $row){
    //                 $data_table .= '
    //                     <tr>
    //                         <td class="text-center">'.$loop.'</td>
    //                         <td>'.$row->pertanyaanDepartemen->pertanyaan->pertanyaan.'</td>
    //                         <td>
    //                             <table>'.$this->getPertanyaanObjektif($row->pertanyaanDepartemen->pertanyaan->id).'</table>
    //                         </td>
    //                         <td>'.$this->getNilai($row->id).'</td>
    //                         <td>'.$row->catatan.'</td>
    //                     </tr>';
    //                 $loop++;
    //             }
               
    //         }else{
    //             $data_table =
    //                 '<tr>
    //                     <td align="center" colspan="5">Data tidak ditemukan.</td>
    //                 </tr>';
    //         }
    //         $data = array(
    //             'data_table' => $data_table,
    //             'getMA' => $getMA->count(),
    //             'getMI' => $getMI->count(),
    //             'getOBS' => $getOBS->count(),
    //             'getOK' => $getOK->count(),
    //             'getIMP' => $getIMP->count(),
    //             'getSubTotalPersentase' => $subTotalPersentase,
    //            );
    //         echo json_encode($data);
    //     }
    // }
    /**
     * Show the form for creating a new resource.
     */
    public function create(UnitSub $unitSub, Pertanyaan $pertanyaan)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        $getNilai = Nilai::all();
        return view('penilaian.create', compact('nav', 'menu', 'unitSub', 'pertanyaan', 'getNilai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UnitSub $unitSub)
    {
        //
        $request->validate([
            'nilai_id' => 'required',
        ]);
        
        $penilaian = new Penilaian();
        $penilaian->unit_sub_id = $unitSub->id;
        $penilaian->pertanyaan_id = $request->pertanyaan_id;
        $penilaian->nilai_id = $request->nilai_id;
        $penilaian->catatan = $request->catatan;
        $penilaian->save();

        if($penilaian){
            return redirect()->route('index.penilaian', $unitSub->id);
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
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        $getNilai = Nilai::all();
        // $objektif = Objektif::where('penilaian_id', $penilaian->id)->get();
        return view('penilaian.update', compact('nav', 'menu', 'unitSub', 'penilaian', 'getNilai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
        $penilaian->nilai_id = $request->nilai_id;
        $penilaian->catatan = $request->catatan;
        $penilaian->save();

        if($penilaian){
            return redirect()->route('index.penilaian', $request->unitSub_id);
        }else{
            return redirect()->route('edit.penilaian', $request->unitSub_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian, UnitSub $unitSub)
    {
        //
        if($penilaian){
            $penilaian->delete();
            return redirect()->route('index.penilaian', $unitSub->id);
        }else{
            return redirect()->route('index.penilaian', $unitSub->id);
        }
    }

    public static function getPenilaian($unit_sub_id, $pertanyaan_iso_id){
        $penilaian = Penilaian::where('penilaian.unit_sub_id', $unit_sub_id)
        ->where('penilaian.pertanyaan_iso_id', $pertanyaan_iso_id)->get();
        return $penilaian;
    }

    public function detailScoring(Request $request, UnitSub $unitSub)
    {
        //
        $nav = 'score';
        $menu = $unitSub->regional->nama;
        $divisi = Divisi::where('regional_id', $unitSub->regional->id)->get();
        $iso = Iso::all();
        $getNilai = Nilai::all();
        $penilaian = Penilaian::join('pertanyaan', 'penilaian.pertanyaan_id', '=', 'pertanyaan.id')
                        ->join('pertanyaan_objektif', 'pertanyaan.id', '=', 'pertanyaan_objektif.pertanyaan_id')
                        ->join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                        ->join('objektif_klausul', 'objektif.id', '=', 'objektif_klausul.objektif_id')
                        ->join('klausul', 'klausul.id', '=', 'objektif_klausul.klausul_id')
                        ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                        ->when($request->iso_id, function ($query) use ($request) {
                            // $query->where('category_id', $request->category_id);
                            $query->where('iso.id', $request->iso_id);
                        })
                        ->where('penilaian.unit_sub_id', $unitSub->id)
                        ->select('penilaian.*')
                        ->distinct()->get();
        
        $arrPenilaian = Penilaian::where('unit_sub_id', $unitSub->id)->pluck('pertanyaan_id');

        $arr_pertanyaan = [];
        foreach($arrPenilaian as $arr_penilaian){
            array_push($arr_pertanyaan, $arr_penilaian);
        }

        $pertanyaan = Pertanyaan::
                        join('pertanyaan_objektif', 'pertanyaan.id', '=', 'pertanyaan_objektif.pertanyaan_id')
                        ->join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                        ->join('objektif_klausul', 'objektif.id', '=', 'objektif_klausul.objektif_id')
                        ->join('klausul', 'klausul.id', '=', 'objektif_klausul.klausul_id')
                        ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                        ->when($request->iso_id, function ($query) use ($request) {
                            // $query->where('category_id', $request->category_id);
                            $query->where('iso.id', $request->iso_id);
                        })
                        ->when($arr_pertanyaan != null, function($query) use ($arr_pertanyaan){
                            for ($i=0; $i < count($arr_pertanyaan); $i++) { 
                                # code...
                                    $query->whereNot('pertanyaan.id', $arr_pertanyaan[$i]);
                            }
                        })
                        ->select('pertanyaan.*')
                        ->distinct()->get();
        $IMP = count(Penilaian::where('nilai_id', 5)->where('unit_sub_id', $unitSub->id)->get());
        $OK = count(Penilaian::where('nilai_id', 4)->where('unit_sub_id', $unitSub->id)->get());
        $OBS = count(Penilaian::where('nilai_id', 3)->where('unit_sub_id', $unitSub->id)->get());
        $MI = count(Penilaian::where('nilai_id', 2)->where('unit_sub_id', $unitSub->id)->get());
        $MA = count(Penilaian::where('nilai_id', 1)->where('unit_sub_id', $unitSub->id)->get());
        $subTotal = Penilaian::join('nilai', 'penilaian.nilai_id', '=', 'nilai.id')
                    ->where('unit_sub_id', $unitSub->id)->sum('nilai.Score');
        //Average = Jumlah score / Max Score * 100
        if(count($penilaian) <= 0){
            $average = 0;
        }else{
            $average = Penilaian::join('nilai', 'penilaian.nilai_id', '=', 'nilai.id')
                        ->where('unit_sub_id', $unitSub->id)->sum('score') / (count($penilaian) * 4) * 100;
        }
        
        return view('penilaian.detail', compact('nav','menu', 'divisi', 'unitSub', 'getNilai', 'penilaian','pertanyaan', 'iso', 'request', 'IMP', 'OK', 'OBS', 'MI', 'MA','subTotal', 'average'));
    }

    public function getPertanyaanObjektif($pertanyaan_id){
        $text = '';
        $pertanyaanObjektif = PertanyaanObjektif::where('pertanyaan_id', $pertanyaan_id)->get();

        if($pertanyaanObjektif->count() > 0){
            foreach($pertanyaanObjektif as $row){
                $text .= '
                    <tr>
                        <td>'.$row->objektif->objektif.'</td>
                        <td>'.$row->objektif->klausul->nama.'</td>
                    </tr>';
            }
        }else{
            $text =
                '';
        }
        return $text;
    }

    public function getNilai($penilaian_id){
        $text = '';
        $penilaian = Penilaian::findOrFail($penilaian_id);
        if($penilaian->nilai_id != null){
            $text .= $penilaian->nilai->nama;
        }else{
            $text .= '--';
        }
        return $text;
    }

    public function getButton($penilaian_id, $unit_sub_id){
        $text = '';
        $penilaian = Penilaian::findOrFail($penilaian_id);
        if($penilaian->nilai_id != null){
            $text .= '<form action="'.route('destroy.penilaian', [$penilaian->id, $unit_sub_id]).'" method="post">
                    <input type="hidden" name="_token" value="'.csrf_token().'">
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatePenilaian-'.$penilaian->id.'">Update Nilai</button>
                        <button type="submit" class="btn btn-danger mr-2 show_confirm" data-toggle="tooltip" title="Hapus">Delete Nilai</button>
                </form>';
        }else{
            $text .= '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputPenilaian-'.$penilaian->id.'">
                        Input Score
                    </button>';
        }
        return $text;
    }
}
