@extends('layout')
@section('title', 'Update Score '.$unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.penilaian', $unitSub->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Data Score <b>{{ $unitSub->nama }}</b></h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.penilaian', $penilaian->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="unitSub_id" value="{{ $unitSub->id }}">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea class="form-control " cols="30" rows="10" readonly>{{ $penilaian->pertanyaan->pertanyaan }}</textarea>
                    </div>
                    <div class="form-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Bukti Objektif</th>
                                    <th scope="col">Nama Klausul</th>
                                    <th scope="col">ISO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <table>
                                            @foreach ($penilaian->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                                <tr>
                                                    <td><p> {!! nl2br($pertanyaanObjektif->objektif->objektif) !!} </p></td>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-size: 16px" class="d-block">Nilai</label>
                                <select class="form-control @error('nilai_id') is-invalid @enderror" name="nilai_id" autofocus>
                                    <option selected value="{{ $penilaian->nilai->id }}">{{ $penilaian->nilai->nama }} - {{ $penilaian->nilai->score }}</option>
                                    @foreach ($getNilai as $getNilai)
                                        @if ($penilaian->nilai->id == $getNilai->id)
                                            @continue
                                        @else
                                            <option value="{{ $getNilai->id }}" {{ old('nilai_id') == $getNilai->id ? "selected" : "" }}>{{ $getNilai->nama }} - {{ $getNilai->score }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('nilai_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-size: 16px" class="d-block">Catatan</label>
                                <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" cols="30" rows="10">{!! $penilaian->catatan !!}</textarea>
                                @error('catatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection