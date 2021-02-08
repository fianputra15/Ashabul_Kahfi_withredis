@extends('user.template.template')
@section('content')
    <style>
        .map-container-6{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container-6 iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
    <br>
    <div class="">
        <div class="owl-carousel owl-theme" id="image-carousel">
            @foreach($berita as $b)
                <div>
                    <div class="card">
                        <div class="img-thumbnail" style="
                            background: url('{{asset('foto_berita/'.$b->foto)}}');
                            background-size : cover;
                            background-position: center;
                            width: 100%;
                            height: 500px;
                            ">
                        </div>
{{--                        <img style="width: 100%;height: 768px" src="{{asset('foto_berita/'.$b->foto)}}" class="img-thumbnail" alt="">--}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   <br><br>

    <div class="mb-4">
        <!-- Gradient divider -->
        <hr data-content="BERITA TERBARU" class="hr-text">
    </div>
    <div class="container">
        <div class="owl-carousel owl-theme" id="news-carousel">
            @foreach($berita as $b)
                <div>
                    <div class="card">
                        <img src="{{asset('foto_berita/'.$b->foto)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$b->judul}}</h5>
                            {{--                        <p class="card-text">{{$b->deskripsi}}</p>--}}
                            <a href="{{route('detail_berita',$b->id)}}" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><br>
    </div>

    <a href="{{route('berita')}}" class="btn btn-secondary" style="display:block; width:10%; margin:0 auto;">Seluruh Berita</a>

    <div class="container">
        <section class="section pb-5">
            <!--Section heading-->
            <h2 class="section-heading h1 pt-4">Temukan Kami</h2>
            <!--Section description-->
{{--            <p class="section-description pb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error--}}
{{--                amet numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum quisquam eum porro a--}}
{{--                pariatur accusamus veniam.</p>--}}

            <div class="row">

                <!--Grid column-->
                <div class="col-sm-12">

                    <!--Form with header-->
                    <div class="card">

                        <div class="card-body">
                            <!--Google map-->
                            <div id="map-container-google-11" class="z-depth-1-half map-container-6" style="height: 400px">
                                <iframe src="https://maps.google.com/?q=-5.0425608,120.0479002&output=svembed"
                                        frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <!--Header-->

{{--                            <p>Hubungi kami</p>--}}
                            <br>



                        </div>

                    </div>
                    <!--Form with header-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-7">



                    <br>
                    <!--Buttons-->
{{--                    <div class="row text-center">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <a class="btn-floating blue accent-1"><i class="fas fa-map-marker-alt"></i></a>--}}
{{--                            <p>San Francisco, CA 94126</p>--}}
{{--                            <p>United States</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <a class="btn-floating blue accent-1"><i class="fas fa-phone"></i></a>--}}
{{--                            <p>+ 01 234 567 89</p>--}}
{{--                            <p>Mon - Fri, 8:00-22:00</p>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <a class="btn-floating blue accent-1"><i class="fas fa-envelope"></i></a>--}}
{{--                            <p>info@gmail.com</p>--}}
{{--                            <p>sale@gmail.com</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
                <!--Grid column-->

            </div>

        </section>
    </div>

    <br><br>
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Kontak Kami</h2>
                <h3 class="section-subheading text-muted">Berikan saran & masukan kepada kami</h3>
            </div>
            @if(\Illuminate\Support\Facades\Session::has('berhasil'))
                <div class="alert" style="background: limegreen;">
                    <b style="color: white">Berhasil Mengirim Pesan</b>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('gagal'))
                <div class="alert bg-danger">
                    <b style="color: white">Gagal Melakukan Pendaftaran</b>
                </div>
            @endif
            <form id="contactForm" method="post" name="sentMessage" novalidate="novalidate" action="{{route('store_content')}}">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" name="nama" placeholder="Nama Anda *" required="required" data-validation-required-message="Harap Isi Nama Anda." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Email Anda *" required="required" data-validation-required-message="Harap Isi Email Anda />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="no_telp" name="no_telp" placeholder="No Telepon Anda *" required="required" data-validation-required-message="Harap Isi No Telepon Anda." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" name="pesan" placeholder="Pesan Anda *" required="required" data-validation-required-message="Harap Isi Pesan Anda"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('#news-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    nav:true,
                    items:3
                }
            }
        })
        $('#image-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                },
                600:{
                    items:1,
                    nav:true
                },
                1000:{
                    nav:true,
                    items:1
                }
            }
        })
    </script>
@endsection
@section('script')
    <script>
        gsap.to("#logo", {duration: 2, x: 200, ease: "bounce"});
    </script>
@endsection
