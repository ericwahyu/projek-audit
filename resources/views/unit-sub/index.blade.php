@extends('layout')
@section('title', 'Unit '.$menu)
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Unit <b>{{ $menu }}</b></h1>
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Regional</th>
                                <th>Nama Unit Sub</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $loop->index+1 }}
                                </td>
                                <td>{{ $data->regional->nama }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <form id="delete" action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        @if ($auth->isAdmin() || $auth->isAuditor())
                                            <a href="{{ route('index.penilaian', $data->id) }}" class="btn btn-info" title="data penilaian">
                                                Data Penilaian</a>
                                        @endif
                                        <a href="{{ route('detail.penilaian', $data->id) }}" class="btn btn-warning" title="Detail Scoring">
                                            Detail Scoring</a>
                                        <a href="{{ route('index.buktiAudit', $data->id) }}" class="btn btn-primary" title="Bukti Audit">
                                            Bukti Audit</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection