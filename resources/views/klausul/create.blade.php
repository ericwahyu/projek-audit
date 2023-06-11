@extends('layout')
@section('title', 'Input Data Klausul')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.klausul') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Klausul</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.klausul') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Iso</label>
                        <select class="form-control @error('iso_id') is-invalid @enderror" name="iso_id">
                            <option disabled selected>-- Pilih Iso --</option>
                            @foreach ($iso as $iso)
                                <option value="{{ $iso->id }}" {{ old('iso_id') == $iso->id ? "selected" : "" }}>{{ $iso->nama }} - {{ $iso->uraian }}</option>
                            @endforeach
                          </select>
                        @error('iso_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Nama</label>
                        <input type="text" name="nama"  class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Uraian</label>
                        <input type="text" name="uraian"  class="form-control @error('uraian') is-invalid @enderror" value="{{ old('uraian') }}">
                        @error('uraian')
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