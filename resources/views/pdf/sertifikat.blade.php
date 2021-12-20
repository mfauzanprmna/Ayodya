<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Atlantis-Lite/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Atlantis-Lite/assets/css/atlantis.min.css">
    <link href="https://www.dafontfree.net/embed/ZXJhcy1kZW1pLWl0Yy1yZWd1bGFyJmRhdGEvMTMvZS82NDc3MS9FUkFTREVNSS5UVEY"
        rel="stylesheet" type="text/css" />
    <style type="text/css" media="print">
        .A3 {
            height: 2339px;
            width: 1654px;
        }

        @page {
            margin: 0;
        }

    </style>

    <title>Document</title>
</head>

<body>
    <div class="A3 fw-bold " >
        {{-- <div  style="background-image: url('{{ asset('image/layout1.png') }}') ; background-size: 500px 250px;   background-position: left;
        background-repeat: no-repeat;
        position: relative;"></div> --}}
        <div class="fotobaground">
            <img src="{{ asset('image/layout1.png') }}" alt="" style=" width: 500px ;  
            position: absolute; top: 30%">
        </div>
        <div class="row">
            <div class="col-sm-4" style="float: left">
                <img src="../../image/layout2.png" width="800px" height="650px">
            </div>
            <div class="col-sm-8 mt-5">
                <center>
                    <h3 style="font-family: 'eras-demi-itc-bold', sans-serif"> No: __ / YAP / <span id="ini"></span>
                        /
                        {{ Carbon\Carbon::now()->isoFormat('YYYY') }} </h3>
                    <p style="font-family: 'eras-demi-itc-bold', sans-serif">Diberikan Kepada:</p>
                    <h1 style="font-family: Edwardian Script ITC; font-size: 50px; margin: -10px 0"
                        class="nama">{{ $siswas->nama_siswa }}
                    </h1>

                    <p style="font-family: 'eras-demi-itc-bold', sans-serif"> Dilahirkan di <span id="tempat">__</span>,
                        pada tanggal <span id="tanggal">__</span>,
                        bulan <span id="bulan">__</span>, tahun <span id="tahun">__</span>
                        <br> Anak dari {{ $siswas->orang_tua }}
                    </p>
                    <h1 style="font-family: Pristina; font-size: 50px; margin: -10px 0">Lulus</h1>

                    <p style="font-family: 'eras-demi-itc-bold', sans-serif" class="desc">Pada ujian
                        tari daerah, modelling &
                        vokal di semester terpadu ke - {{ $siswas->semester }} ( <span id="huruf">___</span> )
                        <br>yang diselenggarakan pada tanggal __, __, __, __ Oktober 2020
                        <br>di Gedung IX Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia - Depok
                        <br>dan tercatat sebagai siswa Ayodya Pala - __
                        <br>dengan nomor induk : {{ $siswas->no_induk }}
                    </p>


                </center>
                <div class="container d-flex justify-content-between">
                    <div class="foto">
                        <img src="../../image/default.png" alt="" id="foto" width="110px" height="150px"
                            style="border-radius: 100%">
                    </div>
                    <div style="text-align: center;">
                        <p class="ttd">Depok, {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}
                            <br>Pimpinan
                        </p>
                        <br>
                        <br>
                        <p>Dra. Budi Agustinah</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        var css = '@page { size: A4 landscape; }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
    </script>
</body>

</html>
