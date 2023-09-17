@extends('layout')
@section('title', 'Data Master User')
@section('section')
<section class="section">
    <div class="section-header">
        <h1>Data Master User</h1>
        <div class="section-header-button">
            <a href="{{ route('create.masterUser') }}" class="btn btn-primary"
                title="Tambah Data Master User">Tambah</a>
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
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
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->email }}</td>
                                @if ($data->role->id == 1)
                                    <td><span class="badge badge-primary">{{ $data->role->role }}</span></td>
                                @elseif ($data->role->id == 2)
                                    <td><span class="badge badge-secondary">{{ $data->role->role }}</span></td>
                                @elseif ($data->role->id == 3)
                                    <td><span class="badge badge-info">{{ $data->role->role }}</span></td>
                                @endif
                                {{-- <td>{{ $data->role->role }}</td> --}}
                                @if (Auth::user()->id == $data->id)
                                    <td></td>
                                @else
                                    <td>
                                        <form id="delete" action="{{ route('destroy.masterUser', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('edit.masterUser', $data->id) }}" class="btn btn-warning" title="Ubah">
                                                Update</a>
                                            <button type="submit" class="btn btn-danger mr-2 show_confirm"
                                                data-toggle="tooltip" title="Hapus">
                                                Delete</button>
                                        </form>
                                    </td>
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