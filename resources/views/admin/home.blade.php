@include('admin.layouts.header')
@include('admin.layouts.sidebar')
            <!-- HEADER DESKTOP--><!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 align="center" class="title-1">Sistem Informasi Ashabul Kahfi</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$calon_anggota}}</h2>
                                                <span>Calon Anggota</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
{{--                                            <canvas id="widgetChart1"></canvas>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$anggota}}</h2>
                                                <span>Anggota</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
{{--                                            <canvas id="widgetChart2"></canvas>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$berita}}</h2>
                                                <span>Berita</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
{{--                                            <canvas id="widgetChart1"></canvas>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{$materi}}</h2>
                                                <span>Materi</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
{{--                                            <canvas id="widgetChart3"></canvas>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br><br><br><br><br><br><br><br>
                    <br><br><br><br><br><br><br><br><br>
                    <br><br><br><br><br><br><br><br><br>
@include('admin.layouts.footer')
