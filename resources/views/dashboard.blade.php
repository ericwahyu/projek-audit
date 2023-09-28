@extends('layout')
@section('title','Dashboard')
@section('section')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            @if (Auth::user())
                @if (Auth::user()->isAdmin())
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pengguna</h4>
                                </div>
                                <div class="card-body">
                                    {{ $countUser }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kantor Regional 3</h4>
                        </div>
                        <div class="card-body">
                            {{ $countKantorRegional3 }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sub Regional Jawa</h4>
                        </div>
                        <div class="card-body">
                            {{ $countKantorRegionalJawa }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sub Regional Kalimantan</h4>
                        </div>
                        <div class="card-body">
                            {{ $countKantorRegionalKalimantan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sub Regional Bali Nusra</h4>
                        </div>
                        <div class="card-body">
                            {{ $countKantorRegionalBaliNusra }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection