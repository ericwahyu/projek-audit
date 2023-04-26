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
                    <div class="form-group">
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