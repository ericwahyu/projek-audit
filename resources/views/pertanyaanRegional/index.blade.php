@extends('layout')
@section('title', 'Daftar Pertanyaan Unit Sub')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Daftar Pertanyaan Unit Sub <b>{{ $menu }}</b></h1>
        <div class="section-header-button">
            <a href="{{ route('create.pertanyaanRegional', $regional->id) }}" class="btn btn-primary"
                title="Tambah Daftar Pertanyaan Unit Sub">Tambah</a>
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
                                <th>Iso</th>
                                {{-- <th>9001</th>
                                <th>14001</th>
                                <th>22301</th>
                                <th>37001</th>
                                <th>27001</th>
                                <th>20000</th>
                                <th>50001</th>
                                <th>45001</th>
                                <th>ISPS Code</th>
                                <th>SMK3</th>
                                <th>Departemen / Divisi / Regional</th>
                                <th>Bukti Objektif / Klausul</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>
                                    <div class="sort-handler ui-sortable-handle text-center">
                                        {{-- {{ $loop->index+1 }} --}}
                                    </div>
                                </td>
                                <td>{{ $data->pertanyaan->pertanyaan }}</td>
                                <td>
                                    <table>
                                        @foreach ($data->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                            <tr>
                                                <td>{{ $pertanyaanObjektif->objektif->objektif }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        @foreach ($data->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                            <tr>
                                                <td>{{ $pertanyaanObjektif->objektif->klausul->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        @foreach ($data->pertanyaan->pertanyaanObjektif as $pertanyaanObjektif)
                                            <tr>
                                                <td>{{ $pertanyaanObjektif->objektif->klausul->iso->nama }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            
                                {{-- <td>{{ $data->pertanyaan->pertanyaanObjektif }}</td> --}}
                                <td>
                                    <form id="delete" action="{{ route('destroy.pertanyaanRegional', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="{{ route('edit.pertanyaan', $data->id) }}" class="btn btn-warning" title="Ubah">
                                            Update</a> --}}
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