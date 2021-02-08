@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Program Kerja Ashabul Kahfi</h2>
                @if(isset($proker))
                    {!! $proker->deskripsi !!}
                @endif
            </div>
        </div>
    </div>
    <br>
@endsection

