@extends('layout')
@section('title', 'Data Bukti Objektif')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Objektif</h1>
        <div class="section-header-button">
            <a href="{{ route('create.objektif') }}" class="btn btn-primary"
                title="Tambah Data Bukti Objektif">Tambah</a>
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
                                <th class="text-center">#</th>
                                <th>Nama Klausul</th>
                                <th>Bukti Objektif</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>
                                    <div class="sort-handler ui-sortable-handle text-center">
                                        <i class="fas fa-th"></i>
                                    </div>
                                </td>

                                <td>{{ $data->klausul->nama }}</td>
                                <td>{{ $data->objektif }}</td>
                                <td>
                                    <form id="delete" action="{{ route('destroy.objektif', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit.objektif', $data->id) }}" class="btn btn-warning" title="Ubah"><i class="far fa-edit"></i>
                                            Update</a>
                                        <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                            data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i>
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