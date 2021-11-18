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
