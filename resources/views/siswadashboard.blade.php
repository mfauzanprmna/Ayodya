@extends('template.appadmin')
@section('main') 
<div class="row row-cols-1 row-cols-md-3 g-4">
    <center>
        <div class="col">
            <div class="card h-100">
              <a href="/admin/siswa" style="text-decorations:none; color:inherit;">
                  <div class="card-body ">
                      {{-- <img src="{{ asset('Atlantis-Lite/assets/img/Teamsuccess _Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px "> --}}
                    <h5 class="card-title " >Data Absen</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </a>
              </div>
            </div>
          </div>
    </center>
    
    <center>
        <div class="col">
            <div class="card h-100">
              <a href="/admin/nilai" style="text-decorations:none; color:inherit;">
                  <div class="card-body ">
                      {{-- <img src="{{ asset('Atlantis-Lite/assets/img/Teamsuccess _Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px "> --}}
                    <h5 class="card-title " >Data Nilai </h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </a>
              </div>
            </div>
          </div>
    </center>
    <center>
        
    <div class="col">
        <div class="card h-100">
          <a href="/admin/nilaivokal" style="text-decorations:none; color:inherit;">
              <div class="card-body">
                  {{-- <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 500px; ;"> --}}
                <h5 class="card-title">Nilai Vokal</h5>
               
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              </a>
          </div>
        </div>
      </div>
    </center>
  
  </div>
   





@endsection
