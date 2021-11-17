<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="{{ asset('Atlantis-Lite/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["{{ asset('Atlantis-Lite/assets/css/fonts.min.css') }}"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/atlantis.min.css') }}">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/demo.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* overflow-x: hidden; */
        }

        .btn-logout {
            border: 1px solid #40514E;
            background: #45aaf2;
            box-shadow: 3px 3px 2px #40514E;
            font-weight: 500;
            color: white;
        }

        .btn-logout:hover {
            background: #1e6592;
            color: #fff;
        }

        .btn-logout:active {
            background: #40514E;
            border: 1px solid #40514E;
        }

        .footer {
            width: 100%;
        }

        .navbar {
          width: 100%;
        }

        .navbar-kecil {
          display: none;
        }

        @media (max-width: 768px) {
          .navbar-kecil {
            display: block;
          }

          .navbar-besar {
            display: none;
          }
        }
    </style>
    <title> - Pembayaran SPP</title>
</head>


<!-- As a heading -->

    {{-- min-width 768px --}}
    <div class="navbar-besar">
      <div class="row" style="width: 100%">
      <div class="col-4">
        <div class="navbar  navbar-light"
            style="background: #2d98da; border-radius: 0px 0px 100px 0px; box-shadow: 5px 7px 0px 1px #40514E">
            <div class="container justify-content-center">
                <a class="navbar-brand pb-2 pt-2" href="#">
                    <img src="{{ asset('image/logo_tb.jpg') }}" alt="" width="40" height="40" class="">
                    <span class="h4 ml-3 text-center text-white" style="font-weight: 550">SPP's - APP</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-8">
        <nav class="navbar">
            <div class="container pt-2 pb-2">
                <form method="POST" action="{{ route('logout') }}" style="margin-left: auto; ">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                        <div class="btn btn-outline-dark pt-2 pb-2 pr-5 pl-5 btn-logout"
                            style="margin-left: auto; border-radius: 30px">
                            Logout
                        </div>
                    </a>
                </form>
            </div>
        </nav>
    </div>
      </div>
    </div>

    {{-- max-width 768px --}}
    <div class="navbar-kecil">
      <div class="row" style="width: 100%">
        <div class="col-8">
          <div class="navbar navbar-light"
              style="background: #2d98da; border-radius: 0px 0px 100px 0px; box-shadow: 5px 7px 0px 1px #40514E">
              <div class="container justify-content-center">
                  <a class="navbar-brand pb-2 pt-2" href="#">
                      <img src="{{ asset('image/logo_tb.jpg') }}" alt="" width="40" height="40" class="">
                      <span class="h4 ms-3 text-center text-white" style="font-weight: 550">SPP's - APP</span>
                  </a>
              </div>
          </div>
      </div>
      <div class="col-4">
          <nav class="navbar">
              <div class="container pt-2 pb-2">
                  <div class="btn btn-outline-dark btn-logout"
                      style="margin-left: auto; border-radius: 50px"><i class="fas fa-sign-out-alt"></i></div>
              </div>
          </nav>
      </div>
    </div>
  </div>

    {{-- Main --}}
    <div class="container-fluid pt-5 pb-5">
      
      @yield('main')
      
    </div>

    <div class="container pt-5 pb-5">
      @yield('main2')
    </div>


    {{-- Footer --}}
<footer class="footer position-absolute bottom-0 start-50 translate-middle-x" style="background: #2d98da; border-radius: 60px 60px 0px 0px ">
  <div class="container text-white">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2 mt-4" style="font-family: poppins">
                <img src="{{ asset('image/logo_tb.jpg') }}" alt="" style="width: 95px; height: 95px" />
            </div>
            <div class="col-lg-3 mt-3">
                <p style="font-size: 20px; ">
                    <b>
                        YAYASAN SETYA BHAKTI <br />
                        SMK TARUNA BHAKTI
                    </b>
                </p>
                <p style="font-size: 13px; font-weight: 400">
                    Jalan Pekapuran Kel. Curug <br />
                    Kec. Cimanggis , Kota Depok <br />
                    Provinsi Jawa Barat <br />
                    Kode Pos : 16953<br />
                    Telepon : (021) 874 4810
                </p>
            </div>
            <div class="col-lg-3 mt-3">
                <p style="font-size: 20px"><b>Admission Information</b></p>
                <br />
                <p style="font-size: 13px; font-weight: 400">
                    Email : <a class="text-white link-email"
                        href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJfrtXDBTmXvRjBmgJVHHJSbRTpLwSxXtCMfZcnbzmglgHtJHJdDwfWdvzzCLGZzlRLstnV"
                        target="_blank">taruna@smktarunabhakti.net</a> <br />
                    Format: name, address, phone number, <br />
                    majors, and description
                </p>
            </div>
            <div class="col-lg-4 mt-3 rounded">
                <iframe class="shadow-lg iframe-maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.9758774687684!2d106.86757171434212!3d-6.3841757642214585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb7eb989aead%3A0xab7c10f23f712046!2sSMK%20Taruna%20Bhakti!5e1!3m2!1sid!2sid!4v1633323181916!5m2!1sid!2sid"
                    style="border-radius: 8px; width: 100%;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
            <hr class="col-lg-12 mt-4" style="border: 1px solid #30E3CA; width: 100%">
                <div class="container text-center justify-content-center pt-5">
                    
                        <p style="font-size: 13px; font-weight: 500">
                            Copyright SMK Taruna Bhakti <br />
                            Developed by Software Engineering SMK Taruna Bhakti
                        </p>
                    
                </div>
  </div>
</footer>





<!--   Core JS Files   -->
<script src="{{ asset('Atlantis-Lite/assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('Atlantis-Lite/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('Atlantis-Lite/assets/js/core/bootstrap.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}">
</script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('Atlantis-Lite/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('Atlantis-Lite/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!-- Atlantis JS -->
<script src="{{ asset('Atlantis-Lite/assets/js/atlantis.min.js') }}"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ asset('Atlantis-Lite/assets/js/setting-demo2.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d +
                            '</option>')
                    });
                });
            }
        });

        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
</script>

</body>

</html>
