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
        <form action="{{ route('update.buktiAudit', $buktiAudit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="unit_sub_id" value="{{ $unitSub->id }}">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Judul</label>
                        <input type="text" name="judul"  class="form-control @error('judul') is-invalid @enderror" value="{{ $buktiAudit->judul }}" autofocus>
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-11">
                            <div class="form-group">
                                <label style="font-size: 16px" class="d-block">File Bukti Audit</label>
                                <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Kosongi jika tidak mengubah gambar !!
                                </small>
                                @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#detail" style="margin-top: 35px">View Gambar</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="10" >{{ $buktiAudit->deskripsi }}</textarea>
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
@section('modal')
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('bukti audit/'. $buktiAudit->file) }}" alt="profile Pic" height="350" width="450">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection