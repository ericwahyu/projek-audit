@extends('layout')
@section('title', 'Detail Score '.$unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Score <b>{{ $unitSub->nama }}</b></h1>
        <div class="section-header-button">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                Detail Score
            </button>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                {{-- <form action="" method="get">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label style="font-size: 16px" class="d-block">ISO</label>
                            <select class="form-control" name="iso_id" id="iso">
                                <option selected disabled>-- Pilih ISO --</option>
                                @foreach ($iso as $iso)
                                    <option value="{{ $iso->id }}" {{ $request->iso_id == $iso->id ? "selected" : "" }}>ISO {{ $iso->nama }} -- {{ $iso->uraian }}</option>
                                @endforeach
                                <option value=""><b>Bersihkan Filter</b></option>
                            </select>
                        </div>
                        <div class="form-group col-md-3" style="margin-top: 35px">
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </div>
                    </div>
                </form> --}}
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Pertanyaan</th>
                                <th>Bukti Objektif</th>
                                <th>Nama Klausul</th>
                                <th>ISO</th>
                                <th>Nilai</th>
                                <th>Catatan</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penilaian as $penilaian)
                                <tr>
                                    <td>
                                        <div class="sort-handler ui-sortable-handle text-center">
                                            {{ $loop->index+1 }}
                                        </div>
                                    </td>
                                    <td>{{ $penilaian->pertanyaan->pertanyaan }}</td>
                                    <td>
                                        <table>
                                            @foreach ($penilaian->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td>{!! nl2br($pertanyaanObjektif->objektif->objektif) !!}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($pertanyaanObjektif->objektif->objektifKlausul as $klausul)
                                                <tr>
                                                    <td>{{ $klausul->klausul->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($pertanyaanObjektif->objektif->objektifKlausul as $klausul)
                                                <tr>
                                                    <td>ISO {{ $klausul->klausul->iso->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        @switch($penilaian->nilai->score)
                                            @case(4)
                                                <span class="badge badge-success">{{ $penilaian->nilai->nama }}</span>
                                                <span class="badge badge-dark">{{ $penilaian->nilai->score }}</span>
                                                @break
                                            @case(3)
                                                <span class="badge badge-success">{{ $penilaian->nilai->nama }}</span>
                                                <span class="badge badge-dark">{{ $penilaian->nilai->score }}</span>
                                                @break
                                            @case(2)
                                                <span class="badge badge-warning">{{ $penilaian->nilai->nama }}</span>
                                                <span class="badge badge-dark">{{ $penilaian->nilai->score }}</span>
                                                @break
                                            @case(1)
                                                <span class="badge badge-danger">{{ $penilaian->nilai->nama }}</span>
                                                <span class="badge badge-dark">{{ $penilaian->nilai->score }}</span>
                                                @break
                                            @case(0)
                                                <span class="badge badge-danger">{{ $penilaian->nilai->nama }}</span>
                                                <span class="badge badge-dark">{{ $penilaian->nilai->score }}</span>
                                                @break
                                            @default
                                        @endswitch
                                    </td>
                                    <td>{!! nl2br($penilaian->catatan) !!}</td>
                                </tr>
                            @endforeach
                            @foreach ($pertanyaan as $pertanyaan)
                            <tr>
                                <td>
                                    <div class="sort-handler ui-sortable-handle text-center">
                                        {{ $loop->index+1 }}
                                    </div>
                                </td>
                                <td>{{ $pertanyaan->pertanyaan }}</td>
                                <td>
                                    <table>
                                        @foreach ($pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                            <tr>
                                                <td>{!! nl2br($pertanyaanObjektif->objektif->objektif) !!}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        @foreach ($pertanyaanObjektif->objektif->objektifKlausul as $klausul)
                                            <tr>
                                                <td>{{ $klausul->klausul->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        @foreach ($pertanyaanObjektif->objektif->objektifKlausul as $klausul)
                                            <tr>
                                                <td>ISO {{ $klausul->klausul->iso->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('modal')
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Score</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tHead>
                        <tr>
                            <th>Jumlah Temuan</th>
                            <th>MA</th>
                            <th>MI</th>
                            <th>OBS</th>
                            <th>OK</th>
                            <th>IMP</th>
                        </tr>
                    </tHead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>{{ $MA }}</td>
                            <td>{{ $MI }}</td>
                            <td>{{ $OBS }}</td>
                            <td>{{ $OK }}</td>
                            <td>{{ $IMP }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <tHead>
                        <tr>
                            <th>Sub Total</th>
                            <th>MA</th>
                            <th>MI</th>
                            <th>OBS</th>
                            <th>OK</th>
                            <th>IMP</th>
                        </tr>
                    </tHead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>{{ $MA*0 }}</td>
                            <td>{{ $MI*1 }}</td>
                            <td>{{ $OBS*2 }}</td>
                            <td>{{ $OK*3 }}</td>
                            <td>{{ $IMP*4 }}</td>
                        </tr>
                    </tbody>
                </table>
                <ul class="list-group">
                    <div class="row">
                        <div class="col-5">
                            <li class="list-group-item">Total Score</li>
                        </div>
                        <div class="col-2">
                            <li class="list-group-item">:</li>
                        </div>
                        <div class="col-5">
                            <li class="list-group-item">{{ number_format($average, 2) }} %</li>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary" id="btnInputScore">Save Score</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection
