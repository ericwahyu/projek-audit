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
                                {{-- <td>{{ is_null($data->nilai) ? 'null' : $data->nilai->nama }}</td>
                                <td>{{ $data->catatan }}</td> --}}
                                <td>{{ $data->regional->nama }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    <form id="delete" action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="#" class="btn btn-warning" title="Ubah"><i class="far fa-edit"></i>
                                            Update</a>
                                        <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                            data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i>
                                            Delete</button> --}}
                                        <a href="{{ route('index.penilaian', $data->id) }}" class="btn btn-info" title="data penilaian">
                                            Data Penilaian</a>
                                        <a href="{{ route('total.penilaian', $data->id) }}" class="btn btn-warning" title="total scoring">
                                            Total Scoring</a>
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