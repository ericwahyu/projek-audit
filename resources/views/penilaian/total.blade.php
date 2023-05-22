@extends('layout')
@section('title', 'Total Scoring '. $unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Total Scoring <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="#" class="btn btn-primary" title="Tambah Daftar Pertanyaan">Tambah</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label style="font-size: 16px" class="d-block">Divisi</label>
                        <select class="form-control" name="" id="divisi">
                            <option selected disabled>-- Pilih Divisi --</option>
                            @foreach ($divisi as $divisi)
                                <option value="{{ $divisi->id }}" {{ old('idDivisi') == $divisi->id ? "selected" : "" }}>{{ $divisi->divisi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label style="font-size: 16px" class="d-block">Departemen</label>
                        <select class="form-control" name="" id="departemen">
                           
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Pertanyaan</th>
                                        <th>Objektif -- Klausul</th>
                                        <th>Nilai</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody id="dataScoring"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nilai MA</td>
                                    <td>:</td>
                                    <td id="MA"></td>
                                </tr>
                                <tr>
                                    <td>Nilai MI</td>
                                    <td>:</td>
                                    <td id="MI"></td>
                                </tr>
                                <tr>
                                    <td>Nilai OBS</td>
                                    <td>:</td>
                                    <td id="OBS"></td>
                                </tr>
                                <tr>
                                    <td>Nilai OK</td>
                                    <td>:</td>
                                    <td id="OK"></td>
                                </tr>
                                <tr>
                                    <td>Nilai IMP</td>
                                    <td>:</td>
                                    <td id="IMP"></td>
                                </tr>
                                <tr>
                                    <td>Sub Total (%)</td>
                                    <td>:</td>
                                    <td id="subTotalPersentase"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('document').ready(function(){
        $('#divisi').change(function(){
            let divisi_id = $(this).val();
            $('input[name="idDivisi"]').val(divisi_id);
            getDepartemen(divisi_id);
        });
        $('#departemen').change(function(){
            let departemen_id = $('#departemen').val();
            let unit_sub_id = {{ $unitSub->id }};
            getScoring(departemen_id, unit_sub_id);
            // $('input[name="idDepartemen"]').val(departemen_id);
        });
        function getDepartemen(divisi_id){
            if(divisi_id){
                $.ajax({
                    type:"GET",
                    url:"{{ route('getDepartemen') }}",
                    data: {'divisi_id': divisi_id},
                    dataType: 'JSON',
                    success:function(response){
                        // console.log(response);
                        if(response){
                            $("#departemen").empty();
                            $("#departemen").append('<option>---Pilih Departemen---</option>');
                            $.each(response.departemen,function(key, value){
                                $("#departemen").append('<option value="'+value.id+'">'+value.departemen+'</option>');
                            });
                        }else{
                            $("#departemen").empty();
                        }
                    }
                });
            }else{
                $("#departemen").empty();
            }
        }
        function getScoring(departemen_id,  unit_sub_id){
            if(departemen_id){
                $.ajax({
                url: "{{ route('getScoring') }}",
                method: 'GET',
                data: {'departemen_id': departemen_id,
                    'unit_sub_id' : unit_sub_id},
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $('#dataScoring').html(response.data_table);
                    $('#MA').empty();
                    $('#MI').empty();
                    $('#OBS').empty();
                    $('#OK').empty();
                    $('#IMP').empty();
                    $('#subTotalPersentase').empty();
                    $('#MA').append(response.getMA);
                    $('#MI').append(response.getMI);
                    $('#OBS').append(response.getOBS);
                    $('#OK').append(response.getOK);
                    $('#IMP').append(response.getIMP);
                    $('#subTotalPersentase').append(response.getSubTotalPersentase);
                }
            });
            }else{
                $('#dataScoring').empty();
            }
        };
    });
</script>
@endsection