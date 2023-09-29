@extends('layout')
@section('title', 'Input Data Bukti Objektif')
@section('section')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('index.objektif') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Data Bukti Objektif</h1>
    </div>
    <div class="section-body">
        <form action="{{ route('store.objektif') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Bukti Objektif</label>
                        <textarea name="objektif" class="form-control @error('objektif') is-invalid @enderror" cols="30" rows="10" autofocus>{{ old('objektif') }}</textarea>
                        @error('objektif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Klausul</label>
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" id="searchK" placeholder="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive" style="overflow-y:scroll; height:700px;">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroupK" data-checkbox-role="dad" class="custom-control-input" id="checkbox-allK">
                                                    <label for="checkbox-allK" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Nama ISO</th>
                                            <th>Uraian ISO</th>
                                            <th>Nama Klausul</th>
                                            <th>Uraian Klausul</th>
                                        </tr>
                                        <tbody id="dataKlausul"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px" class="d-block">Pertanyaan</label>
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
                                <div class="card-header-form">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" id="searchP" placeholder="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive" style="overflow-y:scroll; height:700px;">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroupP" data-checkbox-role="dad" class="custom-control-input" id="checkbox-allP">
                                                    <label for="checkbox-allP" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                        <tbody id="dataPertanyaan"></tbody>
                                    </table>
                                </div>
                            </div>
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
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            fetch_customer_data();
            function fetch_customer_data(query=''){
                $.ajax({
                    url:"{{ route('searchKlausul') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#dataKlausul').html(data.table_data_klausul);
                    }
                });
            };
        });
        $(document).on('keyup', '#searchK', function(){
            $query = $(this).val().toLowerCase();
            $.ajax({
                url: "{{ route('searchKlausul') }}",
                method: 'GET',
                data: {
                    'query': $query
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#dataKlausul').html(data.table_data_klausul);
                }
            });
        });
    </script>
    {{-- pertanyaan --}}
    <script>
        $(document).ready(function(){
            fetch_customer_data();
            function fetch_customer_data(query=''){
                $.ajax({
                    url:"{{ route('searchPertanyaan') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#dataPertanyaan').html(data.table_data_pertanyaan);
                    }
                });
            };
        });
        $(document).on('keyup', '#searchP', function(){
            $query = $(this).val().toLowerCase();
            $.ajax({
                url: "{{ route('searchPertanyaan') }}",
                method: 'GET',
                data: {
                    'query': $query
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#dataPertanyaan').html(data.table_data_pertanyaan);
                }
            });
        });
    </script>
@endsection