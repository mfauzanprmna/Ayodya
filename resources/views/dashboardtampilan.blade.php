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

<div class="card-deck mt-3 container" >
    <div class="col-sm-6">
        
            <div class="card ">
                <div class="row">
                    <div class="col-3 ">
                        <img src="{{ asset('Atlantis-Lite/assets/img/undraw_stand_out_-1-oag.svg')}}" class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                  </div>
                    <div class="col-9"><a href="/admin/siswa" style="text-decorations:none; color:inherit;">
                        <div class="card-body">
                            {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                          <h5 class="card-title">Data Siswa</h5>
                         
                          <p class="card-text">Dalam data siswa terdapat Foto No Induk Nama Siswa Tempat Tanggal Lahir Orang Tua Siswa Alamat Cabang. </p>
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
                        <img src="{{ asset('Atlantis-Lite/assets/img/undraw_Image__folder_re_hgp7.svg')}}" class="card-img-top" alt="..." style="width: 130px ; height: 170px;">
                  </div>
                    <div class="col-9"><a href="/nilaipilihan" style="text-decorations:none; color:inherit;">
                        <div class="card-body">
                            {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                          <h5 class="card-title">Data nilai</h5>
                         
                          <p class="card-text"> nilai adalah susunan angka pada hasil ulangan (ujian) yang diperolehnya sesuai dengan kecakapan atau prestasinya (berkisar antara 1 dan 10 atau 10 dan 100).</p>
                        </a>
                    </div>
                    
                    
                </div>
               
                </div>
              </div>
    
 
    </div>
  </div>



@endsection
