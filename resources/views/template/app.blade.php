<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/atlantis.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('Atlantis-Lite/assets/css/demo.css')}}">
    <title>@yield('title')</title>
    @yield('jquery')
</head>
<body>
    <div class="">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Brand Name</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Crud</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Nilai</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                    <span class="title">Sertifikat</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <!--- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!--- search -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search Here" name="" id="">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!--- userImg -->
                <div class="user">
                    <img src="{{ asset('image/default.png') }}" alt="">
                </div>
            </div>

            <!--- cards -->
            <div class="cardBox">
                <div class="card">
                    <div class="">
                        @yield('main')
                    </div>
                    <div class="iconBx">

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        // MenuToggle
        let pencet = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        pencet.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover', activeLink))
    </script>
</body>
</html>