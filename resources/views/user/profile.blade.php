@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Profile</h2>
                <div class="row">
                    <img class="img-thumbnail" style="width: 100%" src="{{asset('image/'.$profile->foto)}}" alt="">
                </div>
                <div class="row">
                    {!! $profile->deskripsi !!}
                </div>

            </div>
{{--            <h4 align="center">Struktur Kepengurusan</h4>--}}
{{--            <div class="row" style="width: 100%">--}}
{{--                <div class="tree" style="margin: 0 auto;">--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a>--}}
{{--                                <b>Ketua</b>--}}
{{--                                : Parent--}}
{{--                            </a>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a >Child</a>--}}
{{--                                    <ul>--}}
{{--                                        <li>--}}
{{--                                            <a>Grand Child</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a>Child</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a>Grand Child</a></li>--}}
{{--                                        <li>--}}
{{--                                            <a>Grand Child</a>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a>Great Grand Child</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a>Great Grand Child</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a>Great Grand Child</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li><a>Grand Child</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
            <br>
        </div>
    </div>
    <br>
@endsection

