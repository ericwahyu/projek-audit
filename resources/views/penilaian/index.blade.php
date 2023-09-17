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
                                <th>
                                    <i class="fas fa-th"></i>
                                </th>
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
                                        <i class="fas fa-th"></i>
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
                                            @foreach ($penilaian->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td>{{ $pertanyaanObjektif->objektif->klausul->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($penilaian->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td>ISO {{ $pertanyaanObjektif->objektif->klausul->iso->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>{{ $penilaian->nilai->nama }} -- {{ $penilaian->nilai->score }}</td>
                                    {{-- <td>{{ $penilaian->catatan }}</td> --}}
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
                                        <i class="fas fa-th"></i>
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
                                            @foreach ($pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td>{{ $pertanyaanObjektif->objektif->klausul->nama }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            @foreach ($pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td>ISO {{ $pertanyaanObjektif->objektif->klausul->iso->nama }}</td>
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
