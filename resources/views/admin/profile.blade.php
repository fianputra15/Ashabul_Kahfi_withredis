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
                    <h2>Profile <a class="btn btn-outline-primary" href="{{route('edit_profile')}}"><i class="fa fa-edit" ></i>Edit</a></h2>
                    <br>
                    <div class="row">
                        <img class="img-thumbnail" style="width: 100%" src="{{asset('image/'.$profile->foto)}}" alt="">
                    </div>
                    <div class="row">
                        <div class="container">
                            {!! $profile->deskripsi !!}

                        </div>
                    </div>
                    <div class="container">
                        <div id="diagram_container"></div>
                    </div>


                </div>
            </div>
            @section('script')
                <script>
                    let data = [{
                        "id": "643",
                        "text": "KEPALA DINAS",
                        "title": "AAA",
                        "width": "350",
                        "height": "100",
                        "dir": "horizontal",
                        "img": "user.jpg"
                    }, {
                        "id": "656",
                        "text": "KEPALA BAGIAN A",
                        "title": "BBB",
                        "width": "350",
                        "height": "100",
                        "dir": "vertical",
                        "img": "user.jpg"
                    }, {
                        "id": "679",
                        "text": "KEPALA BAGIAN B",
                        "title": "CCC",
                        "width": "350",
                        "height": "100",
                        "dir": "vertical",
                        "img": "user.jpg"
                    }, {
                        "id": "715",
                        "text": "KEPALA BAGIAN C",
                        "title": "DDD",
                        "width": "350",
                        "height": "100",
                        "dir": "vertical",
                        "img": "user.jpg"
                    }, {
                        "id": "1477",
                        "text": "KEPALA BAGIAN D",
                        "title": "EEE",
                        "width": "350",
                        "height": "100",
                        "dir": "vertical",
                        "img": "user.jpg"
                    }, {
                        "id": "643-656",
                        "from": "643",
                        "to": "656",
                        "type": "line"
                    }, {
                        "id": "643-679",
                        "from": "643",
                        "to": "679",
                        "type": "line"
                    }, {
                        "id": "643-715",
                        "from": "643",
                        "to": "715",
                        "type": "line"
                    }, {
                        "id": "643-1477",
                        "from": "643",
                        "to": "1477",
                        "type": "line"
                    }];
                    let diagram = new dhx.Diagram("diagram_container", {
                        type: "org",
                        defaultShapeType: "img-card",
                        scale: 0.9
                    });
                    diagram.data.load(data);
                </script>
@endsection
            @include('admin.layouts.footer')


