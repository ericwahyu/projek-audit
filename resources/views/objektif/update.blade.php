@extends('layout')
@section('title', 'Edit Data Bukti Objektif')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.objektif') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Bukti Objektif</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.objektif', $objektif->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <textarea name="objektif" class="form-control @error('objektif') is-invalid @enderror" cols="30" rows="10">{!! $objektif->objektif !!}</textarea>
                        @error('objektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Klausul</label>
                        <select class="form-control @error('klausul_id') is-invalid @enderror" name="klausul_id">
                            <option selected value="{{ $objektif->klausul->id }}">{{ $objektif->klausul->nama }}</option>
                            @foreach ($klausul as $klausul)
                                @if ($objektif->klausul->id == $klausul->id)
                                    @continue
                                @else
                                <option value="{{ $klausul->id }}" {{ old('klausul_id') == $klausul->id ? "selected" : "" }}>{{ $klausul->nama }}</option>
                                @endif
                            @endforeach
                          </select>
                        @error('klausul_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <div class="table" style="overflow-y:scroll; height:400px;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
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
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $loop->index+1 }}" name="pertanyaan_id[]" value={{ $pertanyaan->id }} {{ (in_array($pertanyaan->id, App\Http\Controllers\ObjektifController::getPertanyaan($objektif->id))) ? 'checked' : '' }}>
                                                    <label for="checkbox-{{ $loop->index+1 }}" class="custom-control-label">&nbsp;</label>
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