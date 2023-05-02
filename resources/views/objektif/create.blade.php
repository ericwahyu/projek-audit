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
                        <label style="font-size: 16px" class="d-block">Klausul</label>
                        <select class="form-control @error('klausul_id') is-invalid @enderror" name="klausul_id">
                            <option disabled selected>-- Pilih Klausul --</option>
                            @foreach ($klausul as $klausul)
                                <option value="{{ $klausul->id }}" {{ old('klausul_id') == $klausul->id ? "selected" : "" }}>{{ $klausul->nama }}</option>
                            @endforeach
                          </select>
                        @error('klausul_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <input type="text" name="objektif"  class="form-control @error('objektif') is-invalid @enderror" value="{{ old('objektif') }}">
                        @error('objektif')
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