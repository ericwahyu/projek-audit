@extends('layout')
@section('title', 'Edit Data Penilaian '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.penilaian', $unitSub->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Data Penilaian <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="#" class="btn btn-primary" title="Tambah Daftar Pertanyaan">Tambah</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
            <form action="{{ route('update.penilaian', [$unitSub->id, $penilaian->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    {{-- <input type="hidden" name="pertanyaan_iso_id" value="{{ $penilaian->pertanyaanIso->id }}"> --}}
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" cols="30" rows="10" readonly>{{ $penilaian->pertanyaanIso->pertanyaan->pertanyaan }}</textarea>
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
                                @foreach ($objektif as $objektif)
                                <tr>
                                    <td>
                                        <textarea name="objektif[]" class="form-control " cols="30" rows="10">{{ $objektif->objektif }}</textarea>
                                    </td>
                                    <td style="text-align:center">
                                        <button class="btn btn-danger remove" type="button">hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 14px" class="d-block">Nilai</label>
                        <select class="form-control @error('nilai_id') is-invalid @enderror" name="nilai_id">
                            <option value="{{ $penilaian->nilai_id }}" selected>{{ $penilaian->nilai->nama }} ({{$penilaian->nilai->score }})</option>
                            @foreach ($nilai as $value)
                                @if ($value->id == $penilaian->nilai_id)
                                    @continue
                                @else
                                    <option value="{{ $value->id }}" >{{ $value->nama }} ({{ $value->score }})</option>
                                @endif
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
                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" cols="30" rows="10">{{ $penilaian->catatan }}</textarea>
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