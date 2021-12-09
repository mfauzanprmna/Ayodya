@extends('template.appadmin')
@section('jquery')
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#tags").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('sertifikat.getSertifikat') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#tags').val(ui.item.label); // display the selected text
                    $('#depan').html(ui.item.value); // save selected id to input
                    $('#belakang').html(ui.item.tes); // save selected id to input
                    return false;
                }
            });

        });
    </script>
@endsection
@section('main')
    <style>
        .A3 {
            width: 100%;
            height: 500px;
            box-shadow: 2px 2px 10px 1px rgba(0, 0, 0, 0.10)
        }

        .bulet{
            margin-left: -75%;
            margin-top: -4%;
        }

        .desc{
            position: absolute;
            z-index: 100;
            bottom: 25%;
        }

    </style>
    <div class="container mt-4 mb-5">
        <div class="ui-widget">
            <label for="tags">Siswa: </label>
            <input id="tags" class="form-control" name="tags">
        </div>
        {{-- <div class="form-group">
            <label for="">Nama Siswa</label>
            <select class="form-control" name="" id="">
                <option>tes</option>
                <option>tes</option>
                <option>tes</option>
            </select>
        </div> --}}
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3" style="background: white;">
                    <img src="{{ asset('Atlantis-Lite/assets/img/ayodya_logo_sertifikat.png') }}" width="20%">
                    <center>
                        <h3 style="font-family: Eras Demi ITC"> No: __ / YAP / X / 2020 </h3>
                        <p style="font-family: Eras Demi ITC">Diberikan Kepada:</p>
                        <h1 style="font-family: Edwardian Script ITC">Duma Kalila</h1>
                        
                        <p style="font-family: Eras Demi ITC"> Dilahirkan di __, pada tanggal __, bulan __, tahun __Anak dari __</p>
                        <h1 style="font-family: Pristina">Lulus</h1>
                        
                        <img src="{{ asset('Atlantis-Lite/assets/img/path118.png') }}" width="10%" class="bulet">
                        <p style="font-family: Eras Demi ITC" class="desc">Pada ujian tari daerah, modelling & vokal di semester terpadu ke - ___ (___)yang diselenggarakan pada tanggal __, __, __, __ Oktober 2020di Gedung IX Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia - Depokdan tercatat sebagai siswa Ayodya Pala - __dengan nomor induk : __</p>
                        
                        
                    </center>
                    <div class="ttd" style="margin-left: 0; text-align: center;">
                        <p>Depok, __ 2020 </p>
                        <p style="margin-right: 3%; margin-top: -2%">Pimpinan </p>
                        <p>Dra. Budi Agustinah</p>
                    </div>

                </div>
                
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-10">
                <div class="container A3" style="background: white;">
                    <br>
                    <div>
                    <h2 class="text-center ">DAFTAR NILAI UJIAN</h2>
                    </div>
                    <table style="margin-left: 100px">
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>Ghinati Humaira Sholeh</td>
                        </tr>
                        <tr>
                            <th>No.Ujian</th>
                            <td>:</td>
                            <td>36</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>:</td>
                            <td>8</td>
                        </tr>
                    </table>

                    <center>
                        <table border='1' style="text-align: center; width: 100%; height:100px" class="mt-3 mb-3">
                            <tr>
                                <th colspan="2">MATERI UJIAN</th>
                                <th colspan="5">NILAI</th>
                            </tr>

                            <tr>
                                <th>DARI DAERAH</th>
                                <th>NAMA TARIAN </th>
                                <th>Wirawa</th>
                                <th>Wiraga</th>
                                <th>Wirasa</th>
                                <th>Subtotal</th>
                                <th>TOTAL</th>
                            </tr>
                            <tr>
                                <td>jawatengah</td>
                                <td>gambiranom</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <th rowspan="2">78.50</th>
                            </tr>
                            <tr>
                                <td>sumatra</td>
                                <td>panen</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                                <td>78.50</td>
                            </tr>
                            <tr>
                                <th colspan="2">undian</th>
                                <td>233</td>
                                <td>23</td>
                                <td>232</td>
                                <th colspan="2">232</th>
                            </tr>
                            <tr>
                                <th colspan="2">Sinopsi</th>
                                <th colspan="5">79.00</th>
                            </tr>

                        </table>

                    </center>
                    <div class="row">
                        <div class="col">
                            <h5 class="fw-bold">KETERANGAN</h5>
                            <tr>
                                <td>A</td>
                                <td>(Amanat Baik)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>B</td>
                                <td>(Baik)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>C</td>
                                <td>(Cukup)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>
                            <br>
                            <tr>
                                <td>D</td>
                                <td>(Kurang)</td>
                                <td>=</td>
                                <td>80</td>
                                <td>-</td>
                                <td>90</td>
                            </tr>

                        </div>
                        <center>
                            <div class="col">
                                <tr>
                                    <td>Depok, 9 Agustis 2021</td>
                                </tr>
                                <br>
                                <tr>
                                    <td>ketua litbang</td>
                                </tr>
                                <br>
                                <br>
                                <tr>
                                    <td></td>
                                </tr>
                                <br>
                                <tr>
                                    <td>wulandari,S.sn</td>
                                </tr>
                            </div>
                        </center>

                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-warning">PDF</button>
                <button type="submit" class="btn btn-info">Print</button>
            </div>
        </div>
    </div>
@endsection
