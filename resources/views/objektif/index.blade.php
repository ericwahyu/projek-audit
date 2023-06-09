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
                                <th class="text-center">No</th>
                                <th>Pertanyaan</th>
                                <th>Bukti Objektif</th>
                                <th>Klausul</th>
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
                                <td>
                                    <table>
                                        @foreach ($data->pertanyaanObjektif as $pertanyaan)
                                            <tr>
                                                <td>{{ $pertanyaan->pertanyaan->pertanyaan }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td><textarea readonly style="border: 0; overflow: auto; outline: none;">{{ $data->objektif }}</textarea></td>
                                <td>{{ $data->klausul->nama }}</td>
                                <td>
                                    <form id="delete" action="{{ route('destroy.objektif', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit.objektif', $data->id) }}" class="btn btn-warning" title="Ubah">
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