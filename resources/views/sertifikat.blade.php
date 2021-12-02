@extends('template.appadmin')
@section('jquery')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('sertifikat.getSertifikat') }}",
                        type: 'GET',
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, values) {
                                nomor_induk = data[key].nomor_induk;
                                nama_siswa = data[key].nama_siswa;
                                $('#depan').append('<h1>' + cabang + '</h1>')
                            })
                        }
                    });
                }
            });
        });
    </script>
@endsection
@section('main')
    <style>
        .A3 {
            width: 100%;
            height: 400px;
            box-shadow: 2px 2px 10px 1px rgba(0, 0, 0, 0.10)
        }

    </style>
    <div class="container mt-4 mb-5">
        <div class="ui-widget">
            <label for="tags">Siswa: </label>
            <input id="tags" class="form-control" name="tags">
        </div>
        {{-- <div class="form-group">
            <label for="">Nama Siswa</label>
            <select class="form-control" name="" id="">
                <option>tes</option>
                <option>tes</option>
                <option>tes</option>
            </select>
        </div> --}}
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3" style="background: white;">
                    <p><input type="text" name="" id="depan"></p>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3" style="background: white;">
                    <p><span id="belakang"></span></p>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
    </div>
@endsection
