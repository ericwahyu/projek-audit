@extends('layout')
@section('title', 'Input Data Bukti Objektif')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.objektif') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Bukti Objektif</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.objektif') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <textarea name="objektif" class="form-control @error('objektif') is-invalid @enderror" cols="30" rows="10" autofocus>{{ old('objektif') }}</textarea>
                        @error('objektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Klausul</label>
                        <select class="form-control select2 @error('klausul_id') is-invalid @enderror" name="klausul_id">
                            <option disabled selected>-- Pilih Klausul --</option>
                            @foreach ($klausul as $klausul)
                                <option value="{{ $klausul->id }}" {{ old('klausul_id') == $klausul->id ? "selected" : "" }}>ISO {{ $klausul->iso->nama }} ({{ $klausul->iso->uraian }}) - {{ $klausul->nama }} - {{ $klausul->uraian }}</option>
                            @endforeach
                        </select>
                        @error('klausul_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Klausul</label>
                        <div class="table" style="overflow-y:scroll; height:400px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroupK" data-checkbox-role="dad" class="custom-control-input" id="checkbox-allK">
                                                <label for="checkbox-allK" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Klausul</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($klausul as $klausul)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroupK" class="custom-control-input" id="checkboxK-{{ $loop->index+1 }}" name="klausul_id[]" value={{ $klausul->id }}>
                                                    <label for="checkboxK-{{ $loop->index+1 }}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>ISO {{ $klausul->iso->nama }} ({{ $klausul->iso->uraian }}) - {{ $klausul->nama }} - {{ $klausul->uraian }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <div class="table" style="overflow-y:scroll; height:400px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroupP" data-checkbox-role="dad" class="custom-control-input" id="checkbox-allP">
                                                <label for="checkbox-allP" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Pertanyaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pertanyaan as $pertanyaan)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroupP" class="custom-control-input" id="checkboxP-{{ $loop->index+1 }}" name="pertanyaan_id[]" value={{ $pertanyaan->id }}>
                                                    <label for="checkboxP-{{ $loop->index+1 }}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $pertanyaan->pertanyaan}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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