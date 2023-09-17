@extends('layout')
@section('title', 'Input Data Bukti Audit '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.buktiAudit', $unitSub->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Bukti Audit <b>{{ $unitSub->nama }}</b></h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.buktiAudit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="unit_sub_id" value="{{ $unitSub->id }}">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Judul</label>
                        <input type="text" name="judul"  class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" autofocus>
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">File Bukti Audit</label>
                        <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
                        @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10" >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
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