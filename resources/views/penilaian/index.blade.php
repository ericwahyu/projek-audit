@extends('layout')
@section('title', 'Data Scoring '.$unitSub->nama)
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.unitSub', $unitSub->regional->id) }}" class="btn btn-icon"><i
                    class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Data Scoring <b>{{ $unitSub->nama }}</b></h1>
        {{-- <div class="section-header-button">
            <a href="{{ route('create.penilaian', $unitSub->id) }}" class="btn btn-primary"
                title="Pengisian Data Penilaian"> Data Penilaian</a>
        </div> --}}
    </div>
    <div class="section-body">
        <div class="card">
            {{-- <div class="card-header">

            </div> --}}
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Pertanyaan</th>
                                <th>Objektif -- Klausul</th>
                                <th>Nilai</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dataPertanyaan"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('modal')
    @foreach ($penilaian as $data)
        <div class="modal fade" id="inputPenilaian-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('update.penilaian', $data->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="unitSub_id" id="unitSub_id" value="{{ $unitSub->id }}">
                            {{ $data->pertanyaanDepartemen->pertanyaan->pertanyaan }}
                            <div class="form-group">
                                <label style="font-size: 16px" class="d-block">Nilai</label>
                                <select class="form-control" name="nilai_id" id="nilai_id" required>
                                    <option disabled selected>-- Pilih Nilai --</option>
                                    @foreach ($getNilai as $nilai)
                                        <option value="{{ $nilai->id }}" {{ old('nilai_id') == $nilai->id ? "selected" : "" }}>{{ $nilai->nama }} &emsp; {{ $nilai->score }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catatan" class="col-form-label">Catatan :</label>
                                <input type="text" class="form-control" id="catatan" name="catatan">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Masukkan catatan jika ada perlu !!
                                </small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnInputScore">Save Score</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($penilaian as $data)
    <div class="modal fade" id="updatePenilaian-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update.penilaian', $data->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="unitSub_id" id="unitSub_id" value="{{ $unitSub->id }}">
                        {{ $data->pertanyaanDepartemen->pertanyaan->pertanyaan }}
                        <div class="form-group">
                            <label style="font-size: 16px" class="d-block">Nilai</label>
                            <select class="form-control" name="nilai_id" id="nilai_id" required>
                                @if ($data->nilai_id != null)
                                    <option selected value="{{ $data->nilai->id }}">{{ $data->nilai->nama }} &emsp; {{ $data->nilai->score }}</option>
                                    @foreach ($getNilai as $nilai)
                                        @if ($data->nilai->id == $nilai->id)
                                            @continue
                                        @else
                                            <option value="{{ $nilai->id }}" {{ old('nilai_id') == $nilai->id ? "selected" : "" }}>{{ $nilai->nama }} &emsp; {{ $nilai->score }}</option>    
                                        @endif
                                    @endforeach
                                @else
                                    <option selected disabled>-- Pilih Nilai ---</option>
                                    @foreach ($getNilai as $nilai)
                                        <option value="{{ $nilai->id }}" {{ old('nilai_id') == $nilai->id ? "selected" : "" }}>{{ $nilai->nama }} &emsp; {{ $nilai->score }}</option>    
                                    @endforeach
                                    
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="col-form-label">Catatan :</label>
                            <input type="text" class="form-control" id="catatan" name="catatan" value="{{ $data->catatan }}">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Masukkan catatan jika ada perlu !!
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnInputScore">Save Score</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
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
            getTable(departemen_id, unit_sub_id);
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
        function getTable(departemen_id,  unit_sub_id){
            if(departemen_id){
                $.ajax({
                url: "{{ route('getPertanyaanDepartemen') }}",
                method: 'GET',
                data: {'departemen_id': departemen_id,
                    'unit_sub_id' : unit_sub_id},
                dataType: 'JSON',
                success: function(response) {
                    console.log(response);
                    $('#dataPertanyaan').html(response.data_table);
                }
            });
            }else{
                $('#dataPertanyaan').empty();
            }
        };
    });
</script>
@endsection