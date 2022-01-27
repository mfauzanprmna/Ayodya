@extends('template.app')
@section('main')

    <style>




    </style>

    <div class="page-inner mt-3">
        <div class="row" >
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header rounded" style="background-image: linear-gradient(#7a74fc, #6C63FF) ">
                        <div class="page-inner py-5">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                                <div>
                                    <h2 class="text-white pb-2 fw-bold" style="font-size: 30px">Selamat Datang Di Ayodya
                                        Pala</h2>
                                    <h5 class="text-white op-7 mb-2">Tari/Vokal</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt--2">
                    <div class="col-md-6">
                        <div class="card full-height" style="height: 100%">
                            <div class="card-body">
                                <center>
                                      <a href="/nilaipilihan" style="text-decoration:none; color:inherit;">
                                    <div class="card-title">Overall statistics</div>
                                    <img src="{{ asset('Atlantis-Lite/assets/img/undraw_scrum_board_re_wk7v.svg')}}" class="card-img-top" alt="..." style="width: 200px ; height: 200px">
                                </a>
                                </center>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card full-height" style="height: 100%">
                            <div class="card-body">
                                <center>
                                    <a href="/nilaipilihan" style="text-decoration:none; color:inherit;">
                                    <div class="card-title">Overall statistics</div>
                                    <img src="{{ asset('Atlantis-Lite/assets/img/undraw_Image__folder_re_hgp7.svg') }}"
                                    class="card-img-top" alt="..." style="width: 200px ; height: 200px;">
                                    </a>
                                </center>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
             
                  {{-- <div class="card " style="height: 100%"> --}}
                    <div class="card rounded " style="background-image: linear-gradient(#7a74fc, #6C63FF); height: 100%">
                         
                        <center>
                        
                            <br>
                            <br>
                          
                                <img src="{{ asset('image/default.png') }}" alt="image profile" class="avatar-img rounded"
                                style="width: 200px; height: 200px; ">
                            <br>
                            <br>
                            <h1 class="card-title text-light" style="font-size: 30px"> <b>Nama Siswa</b> </h1>

                            <br>
                            <table class="text-light"style="font-size: 17px">
                                <tr>
                                    <td>No Induk</td>
                                    <td>:</td>
                                    <td>wdawda</td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td>:</td>
                                    <td>awdawdad</td>
                                </tr>
                            </table>
                            <br>
                            <br>
                     <button class="btn btn-light btn-sm " style="width: 200px" >Edit Profile</button>
                        </center>
                    
                    </div> 
                {{-- </div>  --}}
                   
                   
              

            </div>
        </div>
       
      

    </div>






    @endsection
