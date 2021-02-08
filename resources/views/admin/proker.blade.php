@include('admin.layouts.header')
@include('admin.layouts.sidebar')
            <!-- HEADER DESKTOP--><!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                @if(\Illuminate\Support\Facades\Session::has('berhasil'))
                                    <div class="alert bg-primary">
                                        <b style="color: white">{{\Illuminate\Support\Facades\Session::get('berhasil')}}</b>
                                    </div>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('gagal'))
                                    <div class="alert bg-danger">
                                        <b style="color: white">{{\Illuminate\Support\Facades\Session::get('gagal')}}</b>
                                    </div>
                                @endif
                                <h2>Program Kerja <a class="btn btn-outline-primary" href="{{route('edit_proker')}}"><i class="fa fa-edit" ></i>Edit</a></h2>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        {!! $proker['deskripsi'] !!}
                                    </div>
                                </div>
                            </div>
                    </div>


@include('admin.layouts.footer')
