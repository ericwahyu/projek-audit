@extends('layout')
@section('title', 'Data Penilaian '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Penilaian <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="{{ route('create.penilaian', $unitSub->id) }}" class="btn btn-primary"
                title="Pengisian Data Penilaian"> Data Penilaian</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    @foreach ($iso as $iso_nav)
                    <li class="nav-item">
                        <a class="nav-link {{ ($iso_nav->id == 1) ? 'active' : '' }}" id="home" data-toggle="tab"
                            href="#home{{ $iso_nav->nama }}" role="tab" aria-controls="" aria-selected="">
                            {{$iso_nav->nama }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent2">
                    @foreach ($iso as $iso_tab)
                    <div class="tab-pane fade {{ ($iso_tab->id == 1) ? 'show active' : '' }}"
                        id="home{{ $iso_tab->nama }}" role="tabpanel-{{ $iso_tab->nama }}" aria-labelledby="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pertanyaan</th>
                                    <th scope="col">Bukti Objektif</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iso_tab->pertanyaanIso as $pertanyaanIso)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <td>{{ $pertanyaanIso->pertanyaan->pertanyaan }}</td>
                                    <td>
                                        @if (App\Http\Controllers\PenilaianController::getPenilaian($unitSub->id,$pertanyaanIso->id)->isNotEmpty())
                                            @foreach (App\Http\Controllers\PenilaianController::getPenilaian($unitSub->id, $pertanyaanIso->id) as $penilaian)
                                            <table>
                                                @foreach ($penilaian->objektif as $objektif)
                                                <tr>
                                                    <td>{{ $objektif->objektif }}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            <td>{{ $penilaian->catatan }}</td>
                                            <td>{{ $penilaian->nilai->nama }}</td>
                                            <td>
                                                <form id="delete" action="#" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('edit.penilaian', [$unitSub->id, $penilaian->id]) }}" class="btn btn-warning" title="Ubah">Update</a>
                                                    <button type="submit" class="btn btn-danger mr-2 show_confirm" data-toggle="tooltip" title="Hapus">Delete</button>
                                                </form>
                                            </td>
                                        @endforeach
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('create.penilaian', [$unitSub->id, $pertanyaanIso->id]) }}" class="btn btn-primary" title="input data penilaian">
                                                Input Penilaian</a>
                                        </td>
                                    @endif
                                    </td>
                                    {{-- <td>@mdo</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection