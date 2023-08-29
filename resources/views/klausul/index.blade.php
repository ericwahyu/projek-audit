@extends('layout')
@section('title', 'Data Klausul')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Klausul</h1>
        <div class="section-header-button">
            <a href="{{ route('create.klausul') }}" class="btn btn-primary"
                title="Tambah Data Klausul">Tambah</a>
        </div>
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
                                <th>ISO</th>
                                <th>Nama Klausul</th>
                                <th>Uraian Klausul</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>
                                    <div class="sort-handler ui-sortable-handle text-center">
                                        {{ $loop->index+1 }}
                                    </div>
                                </td>
                                <td>ISO {{ $data->iso->nama }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->uraian }}</td>
                                <td>
                                    <form id="delete" action="{{ route('destroy.klausul', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit.klausul', $data->id) }}" class="btn btn-warning" title="Ubah">
                                            Update</a>
                                        <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                            data-toggle="tooltip" title="Hapus">
                                            Delete</button>
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