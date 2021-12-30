@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('layout.update', $layout->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            

                            <div class="form-group">
                                <label class="font-weight-bold">background</label>
                                <input type="text" class="form-control @error('background') is-invalid @enderror"
                                    name="background" value="{{ old('background', $layout->background) }}"
                                    placeholder="Masukkan Judul background siswa">

                                <!-- error message untuk background -->
                                @error('background')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">kelas</label>
                                <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                    name="kelas" value="{{ old('kelas', $layout->kelas) }}"
                                    placeholder="Masukkan Judul no induk">

                                <!-- error message untuk kelas -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>





                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            {{-- <button type="reset" class="btn btn-md btn-warning">RESET</button> --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
