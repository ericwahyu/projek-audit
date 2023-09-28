@extends('layout')
@section('title', 'Data Bukti Objektif')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Objektif</h1>
        @if (Auth::user())
            @if (Auth::user()->isAdmin() || Auth::user()->isAuditor())
                <div class="section-header-button">
                    <a href="{{ route('create.objektif') }}" class="btn btn-primary"
                        title="Tambah Data Bukti Objektif">Tambah</a>
                </div>
            @endif
        @endif
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Pertanyaan</th>
                                <th>Bukti Objektif</th>
                                <th>Nama Klausul</th>
                                <th>ISO</th>
                                @if (Auth::user())
                                    @if (Auth::user()->isAdmin() || Auth::user()->isAuditor())
                                        <th>Action</th>
                                    @endif
                                @endif
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
                                {{-- <td><textarea readonly style="border: 0; overflow: auto; outline: none;">{{  }}</textarea></td> --}}
                                <td>{!! nl2br($data->objektif) !!}</td>
                                <td>
                                    <table>
                                        @foreach ($data->objektifKlausul as $klausul)
                                            <tr>
                                                <td>{{ $klausul->klausul->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        @foreach ($data->objektifKlausul as $iso)
                                            <tr>
                                                <td>ISO {{ $iso->klausul->iso->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                {{-- <td>{{ $data->klausul->nama }}</td> --}}
                                {{-- <td>ISO {{ $data->klausul->iso->nama }}</td> --}}
                                @if (Auth::user())
                                    @if (Auth::user()->isAdmin() || Auth::user()->isAuditor())
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
                                    @endif
                                @endif
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