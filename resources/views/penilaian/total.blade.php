@extends('layout')
@section('title', 'Total Scoring Penilaian '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Total Scoring Penilaian <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="#" class="btn btn-primary" title="Tambah Daftar Pertanyaan">Tambah</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}

        </div>
    </div>
</section>
@endsection
@section('script')
{{-- <script>
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
</script> --}}
@endsection