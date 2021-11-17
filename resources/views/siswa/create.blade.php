@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">No </label>
                                <input type="text" class="form-control @error('no') is-invalid @enderror" name="no" value="{{ old('no') }}" placeholder="Masukkan no">
                            
                                <!-- error message untuk no -->
                                @error('no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk</label>
                                <input type="text" class="form-control @error('no_induk') is-invalid @enderror" name="no_induk" value="{{ old('no_induk') }}" placeholder="Masukkan Judul no induk">
                            
                                <!-- error message untuk no_induk -->
                                @error('no_induk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan Judul nama siswa">
                            
                                <!-- error message untuk nama_siswa -->
                                @error('nama_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tempat Tgl Lahir</label>
                                <input type="text" class="form-control @error('tempat_tgl_lahir') is-invalid @enderror" name="tempat_tgl_lahir" value="{{ old('tempat_tgl_lahir') }}" placeholder="Masukkan Judul tempat tgl lahir">
                            
                                <!-- error message untuk tempat_tgl_lahir -->
                                @error('tempat_tgl_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">nama orangtua siswa</label>
                                <input type="text" class="form-control @error('nama_orangtua_siswa') is-invalid @enderror" name="nama_orangtua_siswa" value="{{ old('nama_orangtua_siswa') }}" placeholder="Masukkan Judul nama orangtua siswa">
                            
                                <!-- error message untuk nama_orangtua_siswa -->
                                @error('nama_orangtua_siswa')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Judul alamat">
                            
                                <!-- error message untuk alamat -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">cabang</label>
                                <input type="text" class="form-control @error('cabang') is-invalid @enderror" name="cabang" value="{{ old('cabang') }}" placeholder="Masukkan Judul cabang">
                            
                                <!-- error message untuk cabang -->
                                @error('cabang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>




                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection