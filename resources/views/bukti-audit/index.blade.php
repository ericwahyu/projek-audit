@extends('layout')
@section('title', 'Data Bukti Audit'. $unitSub->nama)
@section('section')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Data Bukti Audit <b>{{ $unitSub->nama }}</b></h1>
            @if (Auth::user() && Auth::user()->isAuditor())
                <div class="section-header-button">
                    <a href="{{ route('create.buktiAudit', $unitSub->id) }}" class="btn btn-primary"
                        title="Tambah Data Klausul">Tambah</a>
                </div>
            @endif
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body col-sm-6 col-lg-6">
                    <div class="owl-carousel owl-theme slider" id="slider2">
                        @foreach ($data as $data)        
                            <div><img alt="image" src="{{ asset('bukti audit/'. $data->file) }}">
                                <div class="slider-caption">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="slider-title"><b>{{ $data->judul }}</b></div>
                                            <div class="slider-description">
                                                {{ $data->deskripsi }}
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            @if (Auth::user() && Auth::user()->isAuditor())
                                                <div class="dropdown dropup">
                                                    <a href="#" data-toggle="dropdown" class="badge badge-warning dropdown-toggle">Options</a>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('edit.buktiAudit', [$unitSub->id, $data->id]) }}" class="dropdown-item">Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form id="delete" action="{{ route('destroy.buktiAudit', [$unitSub->id, $data->id]) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger mr-2 mt-2 show_confirm" data-toggle="tooltip" title="Hapus">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection