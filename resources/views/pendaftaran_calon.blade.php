<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pendaftaran</title>
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
            <h2>Ashabul Kahfi<br> Pendaftaran</h2>
            <p>Calon Anggota</p>
        </div>
    </div>

    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form" style="margin-top: 50px;margin-bottom: 20px;">
                @if(\Illuminate\Support\Facades\Session::has('berhasil'))
                    <div class="alert" style="background: limegreen;">
                        <b style="color: white">Berhasil Melakukan Pendaftaran Silahkan Menunggu Informasi Berikutnya</b>
                    </div>
                @endif
                    @if(\Illuminate\Support\Facades\Session::has('gagal'))
                        <div class="alert bg-danger">
                            <b style="color: white">Gagal Melakukan Pendaftaran</b>
                        </div>
                    @endif

                <br>
                <form action="{{route('daftar_anggotabaru')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input required type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input required type="email" name="email" class="form-control" placeholder="contoh@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input required type="telp" name="no_telp" class="form-control" placeholder="08xxxxxxx">
                    </div>
                    <div class="form-group">
                        <label>Tempat & Tanggal Lahir</label>
                        <input required type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
                        <input required type="date" name="tanggal_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea required id="" cols="30" rows="10" name="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input required type="file" class="form-control" name="foto">
                    </div>
                    <button type="submit" class="btn w-100 btn" style="background: #fed136;">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!-- end document-->
