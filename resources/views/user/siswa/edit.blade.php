@extends('template.appadmin')
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Siswa Ayodya</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">No Induk <span class="required-label">*</span></label>
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
                                <label class="">Foto <span class="required-label">*</span></label>
                                <div class="">
                                    <div class="input-file-image">
                                        <img class="img-upload-preview" width="100" height="100"
                                            src="{{ asset('/' . $siswa->foto) }}" alt="preview"
                                            style="border-radius: 50%">
                                        <input type="file" class="form-control mt-2" name="foto" accept="image/*" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa <span class="required-label">*</span></label>
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
                            {{-- <div class="form-group">
                                <label class="font-weight-bold">Tempat</label>
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat"
                                    value="{{ old('tempat', $siswa->tempat) }}" placeholder="Masukkan Tempat Lahir">

                                <!-- error message untuk tempat -->
                                @error('tempat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir <span class="required-label">*</span></label>
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
                                <label class="font-weight-bold">Orang Tua Siswa <span
                                        class="required-label">*</span></label>
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
                                <label class="font-weight-bold">Alamat <span class="required-label">*</span></label>
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
                                <label class="font-weight-bold">Cabang <span class="required-label">*</span></label>
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
                                <label for="" class="font-weight-bold">Password <span class="required-label">* Kosongkan
                                        jika
                                        tidak ingin mengubah password</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
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
