@extends('layout')
@section('title', 'Daftar Pertanyaan')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Daftar Pertanyaan</h1>
        <div class="section-header-button">
            <a href="{{ route('create.pertanyaan') }}" class="btn btn-primary"
                title="Tambah Daftar Pertanyaan">Tambah</a>
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
                                <th>Daftar Pertanyaan</th>
                                <th>Iso 9001</th>
                                <th>Iso 144001</th>
                                <th>Iso 22301</th>
                                <th>Iso 37001</th>
                                <th>Iso 27001</th>
                                <th>Iso 20000</th>
                                <th>Iso 50001</th>
                                <th>Iso 45001</th>
                                <th>Iso ISPS Code</th>
                                <th>Iso SMK3</th>
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

                                <td>{{ $data->pertanyaan }}</td>
                                {{-- <td>{{ App\Http\Controllers\PertanyaanController::getPertanyaanIso($data->id) }}
                                </td> --}}
                                @for ($i = 1; $i <= $isoCount; $i++)
                                    @if (in_array($i, App\Http\Controllers\PertanyaanController::getPertanyaanIso($data->id)))
                                        <td>ada</td>
                                    @else
                                        <td>--</td>
                                    @endif
                                @endfor
                                <td>
                                    <form id="delete" action="#" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('edit.pertanyaan', $data->id) }}" class="btn btn-warning" title="Ubah"><i class="far fa-edit"></i>
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