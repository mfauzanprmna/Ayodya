<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../bower_components/bootstrap-social/bootstrap-social.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"> --}}

    <style>

        .login{
            margin-top: 30% !important;
        }

        form .text-box{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .text-box input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 18px;
            border: none;
            background: none;
            outline: none;
            color: white;
        }

        .text-box label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 20px;
            pointer-events: none;
            transition: .5s;
        }

        .text-box span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: yellow;
            transition: .5s;
        }

        .text-box input:focus ~ label,
        .text-box input:valid ~ label
        {
            top: -5px;
            color: yellow;
        }

        .text-box input:focus ~ span::before,
        .text-box input:valid ~ span::before
        {
            width: 100%;
        }

        @media (max-width: 575px){
            .vh-100{
                background-color: black;
            }
        }
    </style>

    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css"> -->
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-7 px-0 d-none d-sm-block">
                    <img src="https://thumbs.dreamstime.com/b/lake-matheson-south-island-new-zealand-mirror-80239509.jpg" alt="Login image" class="w-100 h-100 min-vh-100"
                        style="object-fit: cover;" id="banner-tb">
                    {{-- <img src="{{ asset('img/bg-tb1.jpg') }}" alt="Login image" class="w-100 vh-100 d-none"
                        style="object-fit: cover; object-position: left;" id="banner-tb1"> --}}
                </div>
                <div class="halaman col-sm-5" style="background-color: black;">
                    <div class="login d-flex h-custom-2 px-5">
                        <span id="info"></span>
                        <form id="frmlogin" style="width: 23rem;" method="POST">
                            @csrf
                            <h3 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px; color: yellow">Login</h3>
                            <div class="mb-5 text-box">
                                <input type="text" id="username" name="username" required/>
                                <span></span>
                                <label for="">Username</label>
                            </div>
                            <div class="mb-4 text-box">
                                <input type="password" id="password" name="password" required/>
                                <span></span>
                                <label for="">Password</label>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-warning btn-lg" type="submit">Login</button>
                            </div>
                            {{-- <p class="small mb-5 pb-lg-2" id="fp"><a class="text-muted" href="">Forgot password?</a> --}}
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
</body>

</html>
