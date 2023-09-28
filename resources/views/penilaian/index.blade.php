@extends('layout')
@section('title', 'Data Scoring '.$unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Scoring <b>{{ $unitSub->nama }}</b></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
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
                </form>
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
                                <th>Action</th>
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
                                    <td>
                                        <form id="delete" action="{{ route('destroy.penilaian', [$penilaian->id, $unitSub->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('edit.penilaian', [$unitSub->id, $penilaian->id]) }}" class="btn btn-warning" title="Update Score"> Update Score</a>
                                            <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                                data-toggle="tooltip" title="Hapus">
                                                Delete</button>
                                        </form>
                                    </td>
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
                                    <td>
                                        <a href="{{ route('create.penilaian', [$unitSub->id, $pertanyaan->id]) }}" class="btn btn-primary" title="Input Score"> Input Score</a>
                                    </td>
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
