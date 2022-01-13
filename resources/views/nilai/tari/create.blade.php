@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data"
                            style="font-size: 17px">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags"
                                    value="{{ old('tags') }}" placeholder="Masukkan" id="tags">

                                <!-- error message untuk tags -->
                                @error('tags')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('induk') is-invalid @enderror" name="induk"
                                    value="{{ old('induk') }}" placeholder="Masukkan" id="induk">

                                <!-- error message untuk induk -->
                                @error('induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror" name="semester"
                                    value="{{ old('semester') }}" placeholder="Masukkan" id="semester">

                                <!-- error message untuk semester -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tari</label>
                                <select name="tari" id="tari" style="width: 100%;"
                                    class="js-example-basic-single form-control @error('wirama') is-invalid @enderror"></select>

                                <!-- error message untuk wirama -->
                                @error('wirama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wirama </label>
                                <input type="text" class="form-control @error('wirama') is-invalid @enderror" name="wirama"
                                    value="{{ old('wirama') }}" placeholder="Masukkan Nilai WIrama">

                                <!-- error message untuk wirama -->
                                @error('wirama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wiraga</label>
                                <input type="text" class="form-control @error('wiraga') is-invalid @enderror" name="wiraga"
                                    value="{{ old('wiraga') }}" placeholder="Masukkan Nilai Wiraga">

                                <!-- error message untuk wiraga -->
                                @error('wiraga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Wirasa</label>
                                <input type="text" class="form-control @error('wirasa') is-invalid @enderror" name="wirasa"
                                    value="{{ old('wirasa') }}" placeholder="Masukkan Nilai Wirasa">

                                <!-- error message untuk wirasa -->
                                @error('wirasa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tari').select2({
                placeholder: 'Tarian',
                width: 'resolve',
                ajax: {
                    url: "{{ route('browse-tari') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                            //tambahkan parameter lainnya di sini jika ada
                        }
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama + ' - ' + item.daerah,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
                templateSelection: function(selection) {
                    var result = selection.text.split('-');
                    return result[0];
                }
            });
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('getsiswa') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                            console.log(data);
                        }
                    });
                },
                select: function(event, ui) {

                    $('#tags').val(ui.item.label);
                    $('#nama').val(ui.item.label);
                    $('#induk').val(ui.item.id);
                    $('#semester').val(ui.item.semester);
                    return false;
                }
            });
        });
    </script>

@endsection
