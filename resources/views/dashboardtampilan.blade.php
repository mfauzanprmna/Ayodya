@extends('template.appadmin')
@section('main')
    <style>
        .card {
            transition: .5s;
        }

        .card:hover {
            transform: scale(1.03);
            transition: .5s;
            box-shadow: 9px 9px 5px 0 rgba(0, 0, 0, 0.03);
        }

    </style>
    {{-- <div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Ayodya Pala</h5>
            </div>
            
        </div>
    </div>
</div> --}}
    <div class="panel-header " style="background-image: linear-gradient(#7a74fc, #6C63FF);">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold" style="font-size: 30px">Dashboard </h2>
                </div>

            </div>
        </div>
    </div>

    <div class="card-deck mt--5 mx-2 row d-flex align-items-center">
        @if (Auth::user()->role == 'admin')
            <div class="col-md-6">
                <a href="/admin/siswa" style="text-decoration:none; color:inherit;">
                    <div class="card mt-3">
                        <div class="row m-3">
                            <div class="col-lg-3">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_stand_out_-1-oag.svg') }}"
                                    class="card-img-top" alt="..." style="width: 130px; height: 170px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                    <h5 class="card-title">Data Siswa</h5>

                                    <p class="card-text">Dalam data siswa terdapat Foto No Induk Nama Siswa Tempat
                                        Tanggal
                                        Lahir Orang Tua Siswa Alamat Cabang. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 ">
                <a href="/nilaipilihan" style="text-decoration:none; color:inherit;">
                    <div class="card mt-3">
                        <div class="row m-3">
                            <div class="col-lg-3 ">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_Image__folder_re_hgp7.svg') }}"
                                    class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                    <h5 class="card-title">Data nilai</h5>

                                    <p class="card-text"> nilai adalah susunan angka pada hasil ulangan (ujian) yang
                                        diperolehnya sesuai dengan kecakapan atau prestasinya (berkisar antara 1 dan 10 atau
                                        10
                                        dan
                                        100).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @elseif(Auth::user()->role == 'juri')
            <div class="col-md-6">
                <a href="/admin/nilai" style="text-decoration:none; color:inherit;">
                    <div class="card mt-3">
                        <div class="row m-3">
                            <div class="col-lg-3">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_stand_out_-1-oag.svg') }}"
                                    class="card-img-top" alt="..." style="width: 130px; height: 170px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                    <h5 class="card-title">Nilai Tari</h5>

                                    <p class="card-text">Dalam data siswa terdapat Foto No Induk Nama Siswa Tempat
                                        Tanggal
                                        Lahir Orang Tua Siswa Alamat Cabang. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 ">
                <a href="/admin/vokal" style="text-decoration:none; color:inherit;">
                    <div class="card mt-3">
                        <div class="row m-3">
                            <div class="col-lg-3 ">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_Image__folder_re_hgp7.svg') }}"
                                    class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                            </div>
                            <div class="col-lg-9">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                    <h5 class="card-title">Nilai Vokal</h5>

                                    <p class="card-text"> nilai adalah susunan angka pada hasil ulangan (ujian) yang
                                        diperolehnya sesuai dengan kecakapan atau prestasinya (berkisar antara 1 dan 10 atau
                                        10
                                        dan
                                        100).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>



@endsection
