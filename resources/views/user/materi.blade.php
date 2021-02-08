@extends('user.template.template_content')
@section('content')

    <div class="container-fluid">
        <div class="form-group">
            @if(\Illuminate\Support\Facades\Session::has('users'))
                <label for="">Pilih Materi</label>
                <select class="form-control" id="search-materi">
                    @foreach($kategori as $k)
                        <option {{($k->id == "1") ? "selected" : ""}}  value="{{$k->id}}">{{$k->kategori}}</option>
                    @endforeach
                </select>
            @else
                <h5>Materi Umum</h5>
            @endif
        </div>
{{--        <div class="card-group">--}}
{{--            <div class="card m-2">--}}
{{--                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg" class="card-img-top" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Card title</h5>--}}
{{--                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                    <a href="{{route('detail_berita')}}" class="btn btn-primary">Selengkapnya</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card m-2">--}}
{{--                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg" class="card-img-top" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Card title</h5>--}}
{{--                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                    <a href="{{route('detail_berita')}}" class="btn btn-primary">Selengkapnya</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card m-2">--}}
{{--                <img src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg" class="card-img-top" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Card title</h5>--}}
{{--                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
{{--                    <a href="{{route('detail_berita')}}" class="btn btn-primary">Selengkapnya</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @foreach($materi as $m)--}}
{{--            <div class="card m-2">--}}
{{--                <img src="{{asset('image/logo.jpeg')}}" class="card-img-top" alt="...">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{$m->title_materi}}</h5>--}}
{{--                    <p class="card-text" style="width: 200px;overflow:hidden;text-overflow: ellipsis;white-space: nowrap;">{{$m->materi}}</p>--}}
{{--                    <p>Penulis : {{$m->author->data_user->nama}}</p>--}}
{{--                    <a href="{{route('detail_berita')}}" class="btn btn-primary">Selengkapnya</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
            <div id="materi">

            </div>
        <br>
    </div>
@endsection
@section('script')
    <script>
        var url = "http://localhost:8000/";
        function getMateri(){
            document.querySelector("#materi").innerHTML = "";
            document.querySelector("#materi").insertAdjacentHTML("beforeend",
                `
                             <div class="card m-2">

                                   <div class="card-body">
                                      <h5 class="card-title">Loading...</h5>
                                   </div>
                                </div>
                        `
            );
            fetch(url + "get_materi/"+1,{
                method : "get"
            }).then(result => result.json())
                .then(response => {
                    document.querySelector("#materi").innerHTML = "";
                    for (let i=0;i<response.length;i++){
                        let download = (response[i].file_materi !== 'kosong' ? `<a href="${url}file_materi/${response[i].file_materi}" class="btn btn-outline" style="color:black"><i class="fa fa-download"></i> Download Materi</a>` : "" );
                        document.querySelector("#materi").insertAdjacentHTML("beforeend",
                            `
                             <div class="card m-2">
                                   <div class="card-body">
                                      <h5 class="card-title">${response[i].title_materi}</h5>
                                      <a href="${url}detail_materi/${response[i].id}" class="btn btn-primary">Selengkapnya</a>
                                      ${download}
                                    </div>
                                </div>
                        `
                        );
                    }
                }).catch(error => {
                console.log(error);
            })
        }
        getMateri();
        document.querySelector("#search-materi").addEventListener("change",(event) =>{
            document.querySelector("#materi").innerHTML = "";
            document.querySelector("#materi").insertAdjacentHTML("beforeend",
                `
                             <div class="card m-2">
                                   <div class="card-body">
                                      <h5 class="card-title">Loading...</h5>
                                   </div>
                                </div>
                        `
            );
           fetch(url + "get_materi/"+event.target.value,{
               method : "get"
           }).then(result => result.json())
            .then(response => {
                document.querySelector("#materi").innerHTML = "";
                for (let i=0;i<response.length;i++){
                    let download = (response[i].file_materi !== 'kosong' ? `<a href="${url}file_materi/${response[i].file_materi}" class="btn btn-outline" style="color:black"><i class="fa fa-download"></i> Download Materi</a>` : "" );
                    document.querySelector("#materi").insertAdjacentHTML("beforeend",
                        `
                             <div class="card m-2">
                                   <div class="card-body">
                                      <h5 class="card-title">${response[i].title_materi}</h5>
                                      <a href="${url}detail_materi/${response[i].id}" class="btn btn-primary">Selengkapnya</a>
                                      ${download}
                                    </div>
                                </div>
                        `
                    );
                }
                if(response.length === 0){
                    document.querySelector("#materi").insertAdjacentHTML("beforeend",`
                        <div class="card m-2">
                            <div class="card-body">
                                <h5 class="card-title">Materi Belum Tersedia</h5>
                            </div>
                        </div>
                    `);

                }

            }).catch(error => {
                console.log(error);
           })
        });
    </script>
@endsection

