@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <img src="{{asset('foto_berita/'.$berita['foto'])}}" class="card-img-top" alt="Gambar">
                <br><br>
                <h2>{{$berita['judul']}}</h2>
                <img src="" alt="">
                <p>
                    {!! $berita['deskripsi'] !!}
                </p>
                <b>{{$berita['updated_at']}}</b><br>
                <a class="btn btn-primary" href="{{route('berita')}}">Kembali</a>
            </div>

        </div>
    </div>
    <br>
@endsection

