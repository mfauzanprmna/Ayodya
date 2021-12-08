@extends('template.appadmin')
@section('main') 
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

<div class="card-deck ">
    <div class="col-sm-6">
        <center>
            <div class="card ">
                <a href="/admin/nilai" style="text-decorations:none; color:inherit;">
                <div class="card-body ">
                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/Teamsuccess _Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px "> --}}
                  <h5 class="card-title " >Nilai Tari</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </a>
                </div>
              </div>
        </center>
        @extends('template.appadmin')
        @section('main') 
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
        <div class="panel-header "  style="background-image: linear-gradient(#7a74fc, #6C63FF);">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Tampilan Nilai</h2>
                        <h5 class="text-white op-7 mb-2">halaman tampilan depan Nilai-Nilai</h5>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="card-deck mt--4 container" >
            <div class="col-sm-6">
                
                    <div class="card ">
                        <div class="row">
                            <div class="col-3 ">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_workout_gcgu.svg')}}" class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                          </div>
                            <div class="col-9"><a href="/admin/nilai" style="text-decorations:none; color:inherit;">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                  <h5 class="card-title">Data Nilai Tari</h5>
                                 
                                  <p class="card-text"> tari adalah salah satu seni dan budaya Indonesia yang wajib dilestarikan. Apalagi, hampir tiap daerah di Indonesia memiliki budayanya masing-masing.</p>
                                </a>
                            </div>
                            
                            
                        </div>
                        </div>
                      </div>
        
              
            </div>
            <div class="col-sm-6 ">
                
                    <div class="card  ">
                        <div class="row">
                            <div class="col-3 ">
                                <img src="{{ asset('Atlantis-Lite/assets/img/undraw_music_re_a2jk.svg')}}" class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                          </div>
                            <div class="col-9"><a href="/admin/nilaivokal" style="text-decorations:none; color:inherit;">
                                <div class="card-body">
                                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                                  <h5 class="card-title">Data nilai Vokal</h5>
                                 
                                  <p class="card-text">vokal adalah suara di dalam bahasa lisan yang dicirikhaskan dengan pita suara yang terbuka sehingga tidak ada tekanan udara yang terkumpul di atas glotis.</p>
                                </a>
                            </div>
                            
                            
                        </div>
                       
                        </div>
                      </div>
            
         
            </div>
          </div>
        
        
        
        @endsection
        
    </div>
    <div class="col-sm-6">
        <center>
            <div class="card ">
                <a href="/admin/nilaivokal" style="text-decorations:none; color:inherit;">
                <div class="card-body">
                    {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                  <h5 class="card-title">Nilai Vokal</h5>
                 
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </a>
                </div>
              </div>
        </center>
 
    </div>
  </div>



@endsection
