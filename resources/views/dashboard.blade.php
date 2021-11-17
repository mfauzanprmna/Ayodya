@extends('template.appadmin')
@section('main')
    

<div class="row">
    <div class="col-sm-6">
      <div class="card ">
        <div class="card-body ">
            <img src="{{ asset('Atlantis-Lite/assets/img/Teamsuccess _Outline.svg')}}" class="card-img-top" alt="..." style="width: 400px ">
          <h5 class="card-title ">Data Siswa</h5>
         
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card ">
        <div class="card-body">
            <img src="{{ asset('Atlantis-Lite/assets/img/DataArranging_Outline.svg')}}" class="card-img-top" alt="..." style="width: 400px ">
          <h5 class="card-title">Data Nilai</h5>
         
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
    </div>
  </div>

@endsection
