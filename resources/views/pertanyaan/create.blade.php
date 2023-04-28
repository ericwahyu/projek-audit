@extends('layout')
@section('title', 'Input Data Pertanyaan')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.pertanyaan') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Pertanyaan</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.pertanyaan') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" cols="30" rows="10">{{ old('pertanyaan') }}</textarea>
                        @error('pertanyaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">ISO</label>
                        @foreach ($iso as $isoData)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input @error('iso') is-invalid @enderror" type="checkbox" id="inlineCheckbox{{ $loop->index+1 }}" value="{{ $isoData->id }}" name="iso[]">
                            <label class="form-check-label" for="inlineCheckbox{{ $loop->index+1 }}">{{ $isoData->nama }}</label>
                        </div>
                        @endforeach
                        @error('iso')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="sort-handler ui-sortable-handle text-center">
                                                {{-- <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label> --}}
                                            </div>
                                        </th>
                                        <th>Klausul</th>
                                        <th>Bukti Objektif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objektif as $objektif)
                                            <tr>
                                                <td>
                                                    <div class="sort-handler ui-sortable-handle text-center">
                                                        <input class="form-check-input checkboxClass" type="checkbox" id="inlineCheckboxx{{ $loop->index+1 }}" name="objektif[]" value={{ $objektif->id }}>
                                                        <label class="form-check-label" for="inlineCheckboxx{{ $loop->index+1 }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $objektif->klausul->nama}}</td>
                                                <td>{{ $objektif->objektif }}</td>
                                            </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection