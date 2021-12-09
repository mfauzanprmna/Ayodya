@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="POST" enctype="multipart/form-data" style="font-size: 17px">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Undian</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                                    name="no_induk" value="{{ old('no_induk') }}" placeholder="Masukkan Judul no induk">

                                <!-- error message untuk no_induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <th>Nomor Induk</th>
                                        <td>:</td>
                                        <td><span id="induk"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>:</td>
                                        <td><span id="nama"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Tari</th>
                                        <td>:</td>
                                        <td><span id="tari"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                        <td>:</td>
                                        <td><span id="semester"></span></td>
                                    </tr>
                                </table>
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

@endsection
