@extends('layout')
@section('title', 'Edit Data ISO')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.iso') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data ISO</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('update.iso', $iso->id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Nama ISO</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $iso->nama }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Uraian ISO</label>
                        <input type="text" name="uraian" class="form-control @error('uraian') is-invalid @enderror" value="{{ $iso->uraian }}">
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