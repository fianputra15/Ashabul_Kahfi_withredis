@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>{{$materi['title_materi']}}</h2>
                <img class="card-img-top" src="{{asset('foto_materi/'.$materi['foto'])}}" alt="">
                <p>
                    {!! $materi['materi'] !!}
                </p>
                <a class="btn btn-primary" href="{{route('materi')}}">Kembali</a>
            </div>
        </div>
    </div>
    <br>
@endsection

