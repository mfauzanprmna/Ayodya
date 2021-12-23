@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('layout.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf



                            <div class="form-group">
                                <label class="">Upload Image <span class="required-label">*</span></label>
                                <div class="">
                                    <div class="input-file input-file-image">
                                        <img class="img-upload-preview" width="150" height="100"
                                            src="http://placehold.it/150x100" alt="preview">
                                        <input type="file" class="form-control form-control-file" id="uploadImg"
                                            name="background" accept="image/*" required>
                                        <label for="uploadImg" class="btn btn-primary btn-round btn-lg"><i
                                                class="fa fa-file-image"></i> Upload a Image</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                    value="{{ old('kelas') }}" placeholder="Masukkan Judul no induk">

                                <!-- error message untuk kelas -->
                                @error('kelas')
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
