<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.green.css')}}">
    <link rel="stylesheet" href="{{asset('css/orgchart.css')}}">
</head>
<style>
    body {
        font-family: "Lato", sans-serif;
    }



    .main-head{
        height: 150px;
        background: #FFF;

    }

    .sidenav {
        height: 100%;
        background-color: #000000;
        overflow-x: hidden;
        padding-top: 20px;
    }


    .main {
        padding: 0px 10px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
    }

    @media screen and (max-width: 450px) {
        .login-form{
            margin-top: 10%;
        }

        .register-form{
            margin-top: 10%;
        }
    }

    @media screen and (min-width: 768px){
        .main{
            margin-left: 40%;
        }

        .sidenav{
            width: 40%;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
        }

        .login-form{
            margin-top: 80%;
        }

        .register-form{
            margin-top: 20%;
        }
    }


    .login-main-text{
        margin-top: 20%;
        padding: 60px;
        color: #fff;
    }

    .login-main-text h2{
        font-weight: 300;
    }

    .btn-black{
        background-color: #000 !important;
        color: #fff;
    }
</style>
<body>
    <div class="sidenav">
        <div class="login-main-text">
            <br><br><br><br><br><br>
            <img style="width: 20%" src="{{asset('image/logo.png')}}" alt="">
            <h2>Ashabul Kahfil<br> Login</h2>
            <p>Login Menggunakan Nomor Telepon atau Email</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
                @if(\Illuminate\Support\Facades\Session::has('failed'))
                    <div class="alert bg-danger">
                        <b style="color: white">Silahkan Login Terlebih Dahulu</b>
                    </div>

                @endif
                    @if(\Illuminate\Support\Facades\Session::has('gagal'))
                        <div class="alert bg-danger">
                            <b style="color: white">Email/No Telepon atau Password Salah</b>
                        </div>

                    @endif
                <form method="post" action="{{route('verify')}}">
                    @csrf
                    <div class="form-group">
                        <label>Email/No Telepon</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn" style="background: #fed136;">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!-- end document-->
