<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.green.css')}}">
    <link rel="stylesheet" href="{{asset('css/orgchart.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <style>
        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
            /*background-color: #555;*/
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            z-index: 99;
            bottom: 23px;
            right: 28px;
            width: 100px;
        }
        /*#loader {*/
        /*    z-index: 1001; !* anything higher than z-index: 1000 of .loader-section *!*/
        /*}*/
        /*h1 {*/
        /*    color: #EEEEEE;*/
        /*}*/

        /*#loader-wrapper .loader-section {*/
        /*    position: fixed;*/
        /*    top: 0;*/
        /*    width: 51%;*/
        /*    height: 100%;*/
        /*    background: #222222;*/
        /*    z-index: 1000;*/
        /*}*/



        /*#loader-wrapper .loader-section.section-left {*/
        /*    left: 0;*/
        /*}*/

        /*#loader-wrapper .loader-section.section-right {*/
        /*    right: 0;*/
        /*}*/
        .map-container-2{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container-2 iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }

        #owl-demo .item img{
            display: block;
            width: 100%;
            height: auto;
        }
        .owl-buttons{
            position: absolute;
            top: -45px;
            left: 50%;
            transform: translateX(-50%);
        }
        hr.dashed {
            border-top: 2px dashed #999;
        }

        hr.dotted {
            border-top: 2px dotted #999;
        }

        hr.solid {
            border-top: 2px solid #999;
        }


        hr.hr-text {
            position: relative;
            border: none;
            height: 1px;
            background:black;
        }

        hr.hr-text::before {
            content: attr(data-content);
            display: inline-block;
            background: #fff;
            font-weight: bold;
            font-size: 0.85rem;
            color: black;
            border-radius: 30rem;
            padding: 0.2rem 2rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


    </style>
</head>
<body style="background: white">
{{--    <nav class="navbar-expand-lg navbar navbar-dark bg-transparent">--}}
{{--        <a class="navbar-brand text-primary""><img width="50" class="d-inline-block align-top" src="{{asset('image/logo.jpeg')}}" alt=""></a>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link text-primary" href="{{route('home')}}">Beranda <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link text-primary" href="{{route('materi')}}">Materi<span class="sr-only">Materi</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link text-primary" href="{{route('berita')}}">Scout Journalist<span class="sr-only">Materi</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link text-primary" href="{{route('proker')}}">Program Kerja <span class="sr-only">Program Kerja</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link text-primary" href="{{route('profile')}}">Profil<span class="sr-only">Profil</span></a>--}}
{{--                </li>--}}

{{--                <li class="nav-item dropdown active">--}}
{{--                    <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Materi--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="nav-item dropdown active">--}}
{{--                    <a class="nav-link text-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Tentang--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item" href="#">Visi & Misi</a>--}}
{{--                        <a class="dropdown-item" href="#">Program Kerja</a>--}}
{{--                        <a class="dropdown-item" href="#">Profil Ashabul Kahfi</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <form class="form-inline" style="margin-right: 20px;">--}}
{{--            <li class="nav-item dropdown active" style="list-style: none">--}}
{{--                @if(\Illuminate\Support\Facades\Session::has('users'))--}}
{{--                    <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <b> {{session()->get('users')['nama']}}</b>--}}
{{--                    </a>--}}
{{--                    <div style="margin-right: 10px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                        <a class="dropdown-item text-primary" href="{{route('profile_user',session()->get('users')['kode_user'])}}"><i class="fas fa-user-alt"></i> {{session()->get('users')['nama']}}</a>--}}
{{--                        <a class="dropdown-item text-primary" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <a href="{{route('login')}}" class="nav-link text-primary" role="button" href=""><i class="fas fa-sign-in-alt"></i> Login</a>--}}
{{--                @endif--}}

{{--            </li>--}}
{{--        </form>--}}
{{--        <button class="navbar-toggler" style="background-color:cornflowerblue;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--    </nav>--}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger"  href="#page-top"><img  id="logo" src="{{asset('image/logo.png')}}" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('home')}}">Beranda</a></li>
                    @if(\Illuminate\Support\Facades\Session::has('users'))
                         <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('materi')}}">Materi</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('berita')}}">Scout</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href={{route('proker')}}>Proker</a></li>
                    @if(!\Illuminate\Support\Facades\Session::has('users'))
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href={{route('pendaftaran')}}>Pendaftaran</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('profile')}}">Profil</a></li>
                </ul>
                <form class="form-inline" style="margin-right: 20px;">
                            <li class="nav-item dropdown active" style="list-style: none">
                                @if(\Illuminate\Support\Facades\Session::has('users'))
                                    <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <b> {{session()->get('users')['nama']}}</b>
                                    </a>
                                    <div style="margin-right: 10px;" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item text-primary" href="{{route('profile_user',session()->get('users')['kode_user'])}}"><i class="fas fa-user-alt"></i> {{session()->get('users')['nama']}}</a>
                                        <a class="dropdown-item text-primary" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                    </div>
                                @else
                                    <a href="{{route('login')}}" class="nav-link text-primary" role="button" href=""><i class="fas fa-sign-in-alt"></i> Login</a>
                                @endif

                            </li>
                        </form>
            </div>
        </div>
    </nav>
<!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang</div>
            <div class="masthead-heading text-uppercase">Ashabul Kahfi</div>
            <a class="btn btn-primary btn-xl text-black text-uppercase js-scroll-trigger" href="{{route('profile')}}">Selengkapnya</a>
        </div>
    </header>
    <br>
    <a href="{{route('user_chat')}}" class="open-button btn btn-primary"><i class="fa fa-send-o"></i> Chat</a>
    @yield('content')
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4 text-white"  style="background: black">
        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left" >
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">
                    <!-- Content -->
                    <h5 class="text-uppercase">Ashabul Kahfi</h5>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 text-white" >
                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white"  href="https://instagram.com/scoutsman23bone?igshid=hrsmxq7t2uaz"><i class="fab fa-instagram"></i> Instagram</a>
                        </li>
                        <li>
                            <a class="text-white"  href="https://instagram.com/scoutsman23bone?igshid=hrsmxq7t2uaz"><i class="fab fa-facebook-f"></i> Facebook</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-3 mb-md-0 mb-3 text-white" >
                    <!-- Links -->
                    <h5 class="text-uppercase">Tautan</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a class="text-white"  href="https://www.scout.org/id">WOSM</a>
                        </li>
                        <li>
                            <a class="text-white"  href="https://www.pramuka.id/">Kwartir Nasional</a>
                        </li>
                        <li>
                            <a class="text-white" href="https://instagram.com/dkdsulawesiselatan?igshid=4s265xwjftnf">Kwartir Daerah</a>
                        </li>
                        <li>
                            <a class="text-white" href="https://instagram.com/dkc.bone?igshid=1lqm864z180yx">Kwartir Cabang</a>
                        </li>
                        <li>
                            <a class="text-white" href="https://instagram.com/dkr_bontocani?igshid=nfjxaq8x0sj4">Kwartir Ranting</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->
        <div class="footer-copyright text-center py-3">© 2020 Ashabul Kahfi
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>
<script src="{{asset('js/jquery-slim.min.js')}}"></script>
<script src="{{asset('js/boostrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="{{asset('dist/js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
@yield('script')
</html>
