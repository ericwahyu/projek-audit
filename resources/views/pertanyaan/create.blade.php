@extends('layout')
@section('title', 'Input Data Pertanyaan')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.pertanyaan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Pertanyaan</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.pertanyaan') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" cols="30" rows="10" autofocus>{{ old('pertanyaan') }}</textarea>
                        @error('pertanyaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection