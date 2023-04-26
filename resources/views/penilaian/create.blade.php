@extends('layout')
@section('title', 'Input Data Penilaian '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.penilaian', $unitSub->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Input Data Penilaian <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="#" class="btn btn-primary" title="Tambah Daftar Pertanyaan">Tambah</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
            <form action="{{ route('store.penilaian', $unitSub->id) }}" method="post">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="pertanyaan_iso_id" value="{{ $pertanyaanIso->id }}">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" cols="30" rows="10" readonly>{{ $pertanyaanIso->pertanyaan->pertanyaan }}</textarea>
                        @error('pertanyaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <th>Bukti Objektif</th>
                                <th style="text-align:center"><button class="btn btn-success addRow" type="button">Tambah</button></th>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 14px" class="d-block">Nilai</label>
                        <select class="form-control @error('nilai_id') is-invalid @enderror" name="nilai_id">
                            <option disabled selected>-- Pilih Nilai --</option>
                            @foreach ($nilai as $value)
                                <option value="{{ $value->id }}" {{ old('nilai_id') == $value->id ? "selected" : "" }}>{{ $value->nama }} ({{ $value->score }})</option>
                            @endforeach
                          </select>
                        @error('nilai_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 14px" class="d-block">Catatan</label>
                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" cols="30" rows="10">{{ old('catatan') }}</textarea>
                        @error('catatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <button class="btn btn-primary">Submit</button> --}}
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="copy invisible">
        <div class="control-group">
            <div class="row">
                <div class="form-group col-11">
                    <label style="font-size: 14px" class="d-block">Bukti Objektif</label>
                    <textarea name="objektif[]" class="form-control @error('objektif[]') is-invalid @enderror" cols="30" rows="10">{{ old('objektif[]') }}</textarea>
                    @error('objektif[]')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-1">
                    <button class="btn btn-danger remove" type="button" style="margin-top: 40px">remove</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow(){
            var tr='<tr>'+
                
            '<td>'+
            ' <textarea name="objektif[]" class="form-control" cols="30"></textarea>'+
            ' </td>'+
            '<td style="text-align:center"><a href="#" class="btn btn-danger remove" type="button">Hapus</a></td>'+
            '</tr>';
            $('tbody').append(tr);
        };

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents("tr").remove();
      });
    });
</script>
@endsection