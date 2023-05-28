@extends('layout')
@section('title', 'Daftar Pertanyaan')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.pertanyaan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Ubah Daftar Pertanyaan</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.pertanyaan', $pertanyaan->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" cols="30" rows="10">{{ $pertanyaan->pertanyaan }}</textarea>
                        @error('pertanyaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Departemen</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="font-size: 16px" class="d-block">Kantor Regional 3</label>
                                    <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple >
                                        <option disabled selected>-- Pilih Departemen Kantor Regional 3 --</option>
                                        @foreach ($departemenKantor as $departemen)
                                            <option value="{{ $departemen->id }}" {{ (in_array($departemen->id, App\Http\Controllers\PertanyaanController::getPertanyaanDepartemen($pertanyaan->id))) ? 'selected' : '' }}>{{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: 16px" class="d-block">Sub Regional Jawa</label>
                                    <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple >
                                        <option disabled selected>-- Pilih Departemen Sub Regional Jawa --</option>
                                        @foreach ($departemenSubJawa as $departemen)
                                            <option value="{{ $departemen->id }}" {{ (in_array($departemen->id, App\Http\Controllers\PertanyaanController::getPertanyaanDepartemen($pertanyaan->id))) ? 'selected' : '' }}>{{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label style="font-size: 16px" class="d-block">Sub Regional Kalimantan</label>
                                    <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple >
                                        <option disabled selected>-- Pilih Departemen Sub Regional Kalimantan --</option>
                                        @foreach ($departemenSubKalimantan as $departemen)
                                            <option value="{{ $departemen->id }}" {{ (in_array($departemen->id, App\Http\Controllers\PertanyaanController::getPertanyaanDepartemen($pertanyaan->id))) ? 'selected' : '' }}>{{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: 16px" class="d-block">Sub Regional Bali Nusra</label>
                                    <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple >
                                        <option disabled selected>-- Pilih Departemen Sub Regional Bali Nusra --</option>
                                        @foreach ($departemenSubBali as $departemen)
                                            <option value="{{ $departemen->id }}" {{ (in_array($departemen->id, App\Http\Controllers\PertanyaanController::getPertanyaanDepartemen($pertanyaan->id))) ? 'selected' : '' }}>{{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple rows="50">
                                <option disabled selected>-- Pilih Departemen --</option>
                                <option disabled selected>-- Pilih Departemen Kantor Regional 3 --</option>
                                @foreach ($departemenKantor as $departemen)
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? "selected" : "" }}>{{ $departemen->divisi->regional->nama }} -- {{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                @endforeach
                                <option disabled selected>-- Pilih Departemen Sub Regional Jawa --</option>
                                @foreach ($departemenSubJawa as $departemen)
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? "selected" : "" }}>{{ $departemen->divisi->regional->nama }} -- {{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                @endforeach
                                <option disabled selected>-- Pilih Departemen Sub Regional Kalimantan --</option>
                                @foreach ($departemenSubKalimantan as $departemen)
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? "selected" : "" }}>{{ $departemen->divisi->regional->nama }} -- {{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                @endforeach
                                <option disabled selected>-- Pilih Departemen Sub Regional Bali Nusra --</option>
                                @foreach ($departemenSubBali as $departemen)
                                    <option value="{{ $departemen->id }}" {{ old('departemen_id') == $departemen->id ? "selected" : "" }}>{{ $departemen->divisi->regional->nama }} -- {{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                                @endforeach
                            </select> --}}
                            {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                                Bisa memilih lebih dari satu Departemen, dengan cara tahan CTRL saat memilih Departemen lainnya !!
                            </small>
                            @error('departemen_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        {{-- <label style="font-size: 16px" class="d-block">Departemen</label>
                        <select class="form-select @error('departemen_id') is-invalid @enderror" name="departemen_id[]" multiple>
                            @foreach ($departemen as $departemen)
                                <option value="{{ $departemen->id }}" {{ (in_array($departemen->id, App\Http\Controllers\PertanyaanController::getPertanyaanDepartemen($pertanyaan->id))) ? 'selected' : '' }}>{{ $departemen->divisi->divisi }} -- {{ $departemen->departemen }}</option>
                            @endforeach
                        </select>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Bisa memilih lebih dari satu Departemen, dengan cara tahan CTRL saat memilih Departemen lainnya !!
                        </small>
                        @error('departemen_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label style="font-size: 16px" class="d-block">ISO</label>
                        @foreach ($iso as $isoData)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('iso') is-invalid @enderror" type="checkbox" id="inlineCheckbox{{ $loop->index+1 }}" value="{{ $isoData->id }}" name="iso[]" {{ (in_array($isoData->id, App\Http\Controllers\PertanyaanController::getPertanyaanIso($pertanyaan->id))) ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineCheckbox{{ $loop->index+1 }}">{{ $isoData->nama }}</label>
                        </div>
                        @endforeach
                        @error('iso')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="sort-handler ui-sortable-handle text-center">
                                            </div>
                                        </th>
                                        <th>Klausul</th>
                                        <th>Bukti Objektif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objektif as $objektif)
                                            <tr>
                                                <td>
                                                    <div class="sort-handler ui-sortable-handle text-center">
                                                        <input class="form-check-input checkboxClass" type="checkbox" id="inlineCheckboxx{{ $loop->index+1 }}" name="objektif[]" value={{ $objektif->id }} {{ (in_array($objektif->id, App\Http\Controllers\PertanyaanController::getPertanyaanObjektif($pertanyaan->id))) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="inlineCheckboxx{{ $loop->index+1 }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $objektif->klausul->nama}}</td>
                                                <td>{{ $objektif->objektif }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection