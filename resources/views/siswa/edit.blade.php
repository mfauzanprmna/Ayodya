@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror"
                                    name="no_induk" value="{{ old('no_induk', $siswa->no_induk) }}"
                                    placeholder="Masukkan no induk">

                                <!-- error message untuk no_induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="font-wight-bold">Foto</label>
                                <img src="{{ asset('image/' . $siswa->foto) }}" alt="">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                    name="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                    placeholder="Masukkan nama siswa">

                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tempat</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat"
                                    value="{{ old('tempat', $siswa->tempat) }}" placeholder="Masukkan Tempat Lahir">

                                <!-- error message untuk tempat -->
                                @error('tempat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                                    placeholder="Masukkan Tanggal Lahir">

                                <!-- error message untuk tanggal_lahir -->
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Orang Tua Siswa</label>
                                <input type="text" class="form-control @error('orang_tua') is-invalid @enderror"
                                    name="orang_tua" value="{{ old('orang_tua', $siswa->orang_tua) }}"
                                    placeholder="Masukkan nama orangtua siswa">

                                <!-- error message untuk orang_tua -->
                                @error('orang_tua')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                    value="{{ old('alamat', $siswa->alamat) }}" placeholder="Masukkan alamat">

                                <!-- error message untuk alamat -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Cabang</label>
                                <input type="text" class="form-control @error('cabang') is-invalid @enderror" name="cabang"
                                    value="{{ old('cabang', $siswa->cabang) }}" placeholder="Masukkan cabang">

                                <!-- error message untuk cabang -->
                                @error('cabang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="font-weight-bold">Password <small style="color: red">* Kosongkan jika
                                        tidak ingin mengubah password</small></label>
                                <input type="password" class="form-control" name="password">
                            </div>


                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
