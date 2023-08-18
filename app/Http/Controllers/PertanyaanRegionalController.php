<?php

namespace App\Http\Controllers;

use App\Models\Iso;
use App\Models\Pertanyaan;
use App\Models\PertanyaanObjektif;
use App\Models\PertanyaanRegional;
use App\Models\Regional;
use Illuminate\Http\Request;

class PertanyaanRegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Regional $regional)
    {
        //
        $nav = 'audit';
        $menu = $regional->nama;
        $data = PertanyaanRegional::where('regional_id', $regional->id)->get();
        // dd($data);
        return view('pertanyaanRegional.index', compact('nav', 'menu', 'regional', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Regional $regional)
    {
        //
        $nav = 'audit';
        $menu = $regional->nama;
        $iso = Iso::all();
        return view('pertanyaanRegional.create', compact('nav', 'menu', 'regional', 'iso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'regional_id' => 'required',
        ]);

        // cek pertanyaan yg sudah ada
        $checkPertanyaanRegional = PertanyaanRegional::where('regional_id', $request->regional_id)->pluck('pertanyaan_id');
        $arr_PertanyaanRegional = [];
        foreach($checkPertanyaanRegional as $perRegional_arr){
            array_push($arr_PertanyaanRegional, $perRegional_arr);
        }

        // add data pertanyaan Regional
        if($request->pertanyaan_id != null){
            foreach($request->pertanyaan_id as $pertanyaanId){
                if(in_array($pertanyaanId, $arr_PertanyaanRegional)){
                    continue;
                }else{
                    $insertPertanyaanRegional = new PertanyaanRegional();
                    $insertPertanyaanRegional->regional_id = $request->regional_id;
                    $insertPertanyaanRegional->pertanyaan_id = $pertanyaanId;
                    $insertPertanyaanRegional->save();
                }
            }
        }else{
            return redirect()->route('create.pertanyaanRegional', $request->regional_id);
        }

        if($insertPertanyaanRegional){
            return redirect()->route('index.pertanyaanRegional', $request->regional_id);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(PertanyaanRegional $pertanyaanRegional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PertanyaanRegional $pertanyaanRegional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PertanyaanRegional $pertanyaanRegional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PertanyaanRegional $pertanyaanRegional)
    {
        //
        // dd($pertanyaanRegional->regional_id);
        if($pertanyaanRegional){
            $pertanyaanRegional->delete();
            return redirect()->route('index.pertanyaanRegional', $pertanyaanRegional->regional_id)->with('success', 'Data berhasil di hapus !!');
        }else{
            return redirect()->route('index.pertanyaanRegional', $pertanyaanRegional->regional_id)->with('error', 'Gagal menghapus data !!');
        }
    }

    public function getPertanyaanRegional(Request $request){
        if($request->ajax()){
            $iso_id = $request->get('iso_id');
            $regional_id = $request->get('regional_id');

            $pertanyaan = Pertanyaan::join('pertanyaan_objektif', 'pertanyaan.id', '=', 'pertanyaan_objektif.pertanyaan_id')
                            ->join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                            ->join('klausul', 'klausul.id', '=', 'objektif.klausul_id')
                            ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                            ->where('iso.id', $iso_id)
                            ->select('pertanyaan.*')
                            ->orderBy('pertanyaan.created_at', 'ASC')->distinct()->get();
            
            if($pertanyaan->count() > 0){
                $data_table = '';
                $loop = 1;
                foreach($pertanyaan as $row){
                    list($data1, $data2, $data3) = $this->getBuktiObjektif($row->id);
                    $checklist = $this->checkPertanyaan($row->id, $regional_id);
                    $data_table .= '
                        <tr>
                            <td>
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-'.$loop.'" name="pertanyaan_id[]" value="'.$row->id.'" '. $checklist .'>
                                    <label for="checkbox-'.$loop.'" class="custom-control-label">&nbsp;</label>
                                </div>
                            </td>
                            <td>'.$row->pertanyaan.'</td>
                            <td>
                                <table>
                                    '.$data1.' 
                               </table>
                            </td>
                            <td>
                                <table>
                                    '.$data2.' 
                               </table>
                            </td>
                            <td>
                                <table>
                                    '.$data3.' 
                               </table>
                            </td>
                        </tr>';
                    $loop++;
                }
            }else{
                $data_table =
                    '<tr>
                        <td align="center" colspan="5">Data tidak ditemukan.</td>
                    </tr>';
            }

            $data = array(
                'data_table' => $data_table,
                );
                
            echo json_encode($data);
        }  
    }

    private function getBuktiObjektif($pertanyaan_id){
        $buktiObjektif = PertanyaanObjektif::join('objektif', 'objektif.id', '=', 'pertanyaan_objektif.objektif_id')
                ->join('klausul', 'klausul.id', '=', 'objektif.klausul_id')
                ->join('iso', 'iso.id', '=', 'klausul.iso_id')
                ->where('pertanyaan_objektif.pertanyaan_id', $pertanyaan_id)
                ->select('pertanyaan_objektif.*')->distinct()->get();

        $dataBuktiObjektif = '';
        $dataKlausul = '';
        $dataIso = '';

            foreach($buktiObjektif as $row){
                $dataBuktiObjektif .= '<tr>
                                            <td>' .$row->objektif->objektif. '</td>
                                        </tr>';
                $dataKlausul        .= ' <tr>
                                            <td>' .$row->objektif->klausul->nama. '</td>
                                        </tr>';
                $dataIso            .= ' <tr>
                                            <td>' .$row->objektif->klausul->iso->nama. '</td>
                                        </tr>';
            }
        return [$dataBuktiObjektif, $dataKlausul, $dataIso];
    }

    private function checkPertanyaan($pertanyaan_id, $regional_id){
        $pertanyaanRegional = PertanyaanRegional::where('pertanyaan_id', $pertanyaan_id)
                            ->where('regional_id', $regional_id)
                            ->get();

        $checklist = '';
        if($pertanyaanRegional->isEmpty()){
            $checklist = '';
        }else{
            $checklist = 'checked disabled';
        }

        return $checklist;
    }
}
