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
                    <h2 class="text-white pb-2 fw-bold" style="font-size: 30px">Tampilan Nilai</h2>
                    <h5 class="text-white op-7 mb-2">halaman tampilan depan Nilai-Nilai</h5>
                </div>

            </div>
        </div>
    </div>

    <div class="card-deck mt--5 mx-2 row d-flex align-items-center">
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
                                <h5 class="card-title">Data Nilai Tari</h5>

                                <p class="card-text"> tari adalah salah satu seni dan budaya Indonesia yang wajib
                                    dilestarikan. Apalagi, hampir tiap daerah di Indonesia memiliki budayanya masing-masing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6 ">
            <a href="/admin/nilaivokal" style="text-decoration:none; color:inherit;">
                <div class="card mt-3">
                    <div class="row m-3">
                        <div class="col-lg-3 ">
                            <img src="{{ asset('Atlantis-Lite/assets/img/undraw_music_re_a2jk.svg') }}" class="card-img-top"
                            alt="..." style="width: 130px ; height: 170px;">
                        </div>
                        <div class="col-lg-9">
                            <div class="card-body">
                                {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                <h5 class="card-title">Data nilai Vokal</h5>

                                <p class="card-text">vokal adalah suara di dalam bahasa lisan yang dicirikhaskan dengan
                                    pita suara yang terbuka sehingga tidak ada tekanan udara yang terkumpul di atas glotis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>



@endsection

