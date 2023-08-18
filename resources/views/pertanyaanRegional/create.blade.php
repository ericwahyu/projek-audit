@extends('layout')
@section('title', 'Tambah Daftar Pertanyaan Unit Sub')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.pertanyaanRegional', $regional->id) }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Daftar Pertanyaan Unit Sub <b>{{ $menu }}</b></h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <select class="form-control col-4" id="isoId">
                    <option disabled selected>-- Pilih Iso --</option>
                    @foreach ($iso as $iso)
                        <option value="{{ $iso->id }}" >ISO {{ $iso->nama }} - {{ $iso->uraian }}</option>
                    @endforeach
                </select>
            </div>
            <form action="{{ route('store.pertanyaanRegional') }}" method="post">
                @csrf
                <input type="hidden" name="regional_id" value="{{ $regional->id }}">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Daftar Pertanyaan</th>
                                    <th>Bukti Objektif</th>
                                    <th>Klausul</th>
                                    <th>Iso</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                                <tbody id="dataTable"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('document').ready(function(){
            $('#isoId').change(function(){
                let iso_id = $(this).val();
                let regional_id = {{ $regional->id }};
                if(iso_id){
                    $.ajax({
                        type:"GET",
                        url:"{{ route('getPertanyaanRegional') }}",
                        data: {'iso_id': iso_id, 'regional_id': regional_id},
                        dataType: 'JSON',
                        success:function(response){
                            // console.log(response);
                            $("#dataTable").empty();
                            $('#dataTable').html(response.data_table);
                        }
                    });
                }else{
                    $("#dataTable").empty();
                }
            });
        })
    </script>
@endsection