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
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data"
                            style="font-size: 17px">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('siswa') is-invalid @enderror" name="siswa"
                                    value="{{ $nilai->no_induk }} - {{ $nilai->siswa->nama_siswa }}" placeholder="Masukkan" id="siswa">

                                <!-- error message untuk siswa -->
                                @error('siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Semester</label>
                                <input type="text" class="form-control @error('semester') is-invalid @enderror"
                                    name="semester" value="{{ old('semester', $nilai->semester) }}" placeholder="Masukkan" id="semester">

                                <!-- error message untuk semester -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Penampila</label>
                                <input type="text" class="form-control @error('penampilan') is-invalid @enderror" name="penampilan"
                                    value="{{ old('penampilan', $nilai->penampilan) }}" placeholder="Masukkan Nilai Penampilan">

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
                                    value="{{ old('teknik', $nilai->teknik) }}" placeholder="Masukkan Nilai Teknik">

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

@endsection
