@extends('template.appadmin')
@section('main')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('nilaivokal.update', $nilaivokal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">penampilan </label>
                                <input type="text" class="form-control @error('penampilan') is-invalid @enderror" name="penampilan" value="{{ old('penampilan', $nilaivokal->penampilan) }}" placeholder="Masukkan penampilan">
                            
                                <!-- error message untuk penampilan -->
                                @error('penampilan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">teknik</label>
                                <input type="text" class="form-control @error('teknik') is-invalid @enderror" name="teknik" value="{{ old('teknik', $nilaivokal->teknik) }}" placeholder="Masukkan Judul no induk">
                            
                                <!-- error message untuk teknik -->
                                @error('teknik')
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