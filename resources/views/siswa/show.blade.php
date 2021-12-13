@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ asset('/' . $siswa->foto) }}" alt="" style="width: 130px ; height: 170px;">
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body">
                            {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                            <h5 class="card-title"> <b>Data Siswa {{ $siswa->nama_siswa }}</b> </h5>
            
                           <table>
                                <tr>
                                    <td>No Induk</td>
                                    <td>:</td>
                                    <td>{{ $siswa->no_induk  }}</td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>:</td>
                                    <td>{{ $siswa->semester  }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{{ $siswa->tempat }}, {{ $siswa->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{ $siswa->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Cabang</td>
                                    <td>:</td>
                                    <td>{{ $siswa->cabang }}</td>
                                </tr>
                                </table>  
                           
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
 
@endsection
