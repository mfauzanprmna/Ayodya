@extends('template.appadmin')
@section('main')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <style>
        .form-edit {
            font-size: 14px;
            border-color: #ebedf2 !important;
        }

    </style>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Nilai Vokal</h4>
                        </div>
                    </div>
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
                                <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ old('semester') }}" placeholder="Masukkan" id="semester">

                                <!-- error message untuk semester -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label class="font-weight-bold">Juri</label>
                                    <select name="juri" id="" type="text"
                                        class="form-control @error('juri') is-invalid @enderror" name="juri"
                                        value="{{ old('juri') }}" placeholder="Masukkan Juri">
                                        <option value="">
                                            <-- Pilih Juri -->
                                        </option>
                                        @foreach ($juri as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    <!-- error message untuk juri -->
                                    @error('juri')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="font-weight-bold">Penampilan</label>
                                <input type="text" class="form-control @error('penampilan') is-invalid @enderror"
                                    name="penampilan" value="{{ old('penampilan') }}"
                                    placeholder="Masukkan Nilai Penampilan">

                                <!-- error message untuk penampilan -->
                                @error('penampilan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Teknik</label>
                                <input type="text" class="form-control @error('teknik') is-invalid @enderror" name="teknik"
                                    value="{{ old('teknik') }}" placeholder="Masukkan Nilai Teknik">

                                <!-- error message untuk teknik -->
                                @error('teknik')
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
