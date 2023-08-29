@extends('layout')
@section('title', 'Edit Data Klausul')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.klausul') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Klausul</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.klausul', $klausul->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">ISO</label>
                        <select class="form-control @error('iso_id') is-invalid @enderror" name="iso_id">
                            <option value="{{ $klausul->iso->id }}" selected>ISO {{ $klausul->iso->nama }} - {{ $klausul->iso->uraian }}</option>
                            @foreach ($iso as $iso)
                                @if ($klausul->iso->id == $iso->id)
                                    @continue
                                @else
                                    <option value="{{ $iso->id }}">ISO {{ $iso->nama }} - {{ $iso->uraian }}</option>
                                @endif
                            @endforeach
                          </select>
                        @error('iso_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Nama Klausul</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $klausul->nama }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Uraian Klausul</label>
                        <input type="text" name="uraian" class="form-control @error('uraian') is-invalid @enderror" value="{{ $klausul->uraian }}">
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