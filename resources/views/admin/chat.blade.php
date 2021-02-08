@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<!-- HEADER DESKTOP--><!-- MAIN CONTENT-->
<style>
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
        height: 516px;
        overflow-y: auto;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="au-card recent-report">
                        <div class="au-card-inner">
                            <h3 class="title-2">E-Warning Keseluruhan</h3>
                            <div class="chart-info">
                                <div class="chart-info__left">
                                    <div class="chart-note">
                                        <span class="dot dot--blue"></span>
                                        <span>products</span>
                                    </div>
                                    <div class="chart-note mr-0">
                                        <span class="dot dot--green"></span>
                                        <span>services</span>
                                    </div>
                                </div>
                                <div class="chart-info__right">
                                    <div class="chart-statis">
                                        <span class="index incre">
                                            <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                        <span class="label">products</span>
                                    </div>
                                    <div class="chart-statis mr-0">
                                        <span class="index decre">
                                            <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                        <span class="label">services</span>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-report__chart">
                                <canvas id="recent-rep-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card recent-report">
                        <div class="au-card-inner">
                            <div class="container">
                                <h3>Chat Dengan Admin</h3><br>
                                <div class="messaging">
                                    <div class="inbox_msg">
                                        <div class="inbox_people">
                                            <div class="headind_srch">
                                                <div class="recent_heading">
                                                    <h4>Chat Belum Dibaca</h4>
                                                </div>
{{--                                                <div class="srch_bar">--}}
{{--                                                    <div class="stylish-input-group">--}}
{{--                                                        <input type="text" class="search-bar"  placeholder="Search" >--}}
{{--                                                        <span class="input-group-addon">--}}
{{--                                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>--}}
{{--                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="inbox_chat">
                                                @if(sizeof($chat) > 0)
                                                    @foreach($chat as $c)
                                                        @if($c->kode_penerima !== '0PuM32')
                                                            <div class="chat_list active_chat">
                                                                <div class="chat_people">
                                                                    <div class="chat_img"> <img src="{{asset('foto_anggota/'.$c->foto)}}" alt="sunil"> </div>
                                                                    <div class="chat_ib">
                                                                        <h5><a href="{{url('admin/get_chat/'.$c->kode_pengirim."/".$c->id)}}">{{$c->nama}}</a><span class="chat_date">{{$c->created_at}}</span></h5>
                                                                        @if(!$c->status)
                                                                            <p><h6>{{$c->pesan}} <sup>*</sup></h6></p>
                                                                        @else
                                                                            <p>{{$c->pesan}}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <h4>Semua Chat Telah Dibaca</h4>
                                                    @foreach($list_contact as $c)
                                                        @if($c->kode_penerima !== '0PuM32')
                                                            <div class="chat_list active_chat">
                                                                <div class="chat_people">
                                                                    <div class="chat_img"> <img src="{{asset('foto_anggota/'.$c->foto)}}" alt="sunil"> </div>
                                                                    <div class="chat_ib">
                                                                        <h5><a href="{{url('admin/get_chat/'.$c->kode_user."/none")}}">{{$c->nama}}</a><span class="chat_date">{{$c->created_at}}</span></h5>
{{--                                                                        @if(!$c->status)--}}
{{--                                                                            <p><h6>{{$c->pesan}} <sup>*</sup></h6></p>--}}
{{--                                                                        @else--}}
{{--                                                                            <p>{{$c->pesan}}</p>--}}
{{--                                                                        @endif--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif


{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="chat_list">--}}
{{--                                                    <div class="chat_people">--}}
{{--                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                                        <div class="chat_ib">--}}
{{--                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>--}}
{{--                                                            <p>Test, which is a new approach to have all solutions--}}
{{--                                                                astrology under one roof.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        <div class="mesgs">
                                            <div class="msg_history">
                                                @if(isset($chat_detail))
                                                    @foreach($chat_detail as $c)
                                                        @if($c->kode_pengirim !== $penerima)
                                                            <div class="outgoing_msg">
                                                                <div class="sent_msg">
                                                                    <p>{{$c->pesan}}</p>
                                                                    <span class="time_date"> {{$c->created_at}}</span> </div>
                                                            </div>
                                                        @else
                                                            <div class="incoming_msg">
                                                                <div class="incoming_msg_img"> <img src="{{asset('foto_anggota/'.$c->foto)}}" alt="sunil"> </div>
                                                                <div class="received_msg">
                                                                    <div class="received_withd_msg">
                                                                        <p>{{$c->pesan}}</p>
                                                                        <span class="time_date">{{$c->created_at}}</span></div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </div>
                                            <div class="type_msg">
                                                <form method="POST" action="{{route('store_chat')}}">
                                                    @csrf
                                                    <div class="input_msg_write">
                                                        <input type="hidden" id="penerima" name="penerima" value="{{(empty($penerima)) ? "" : $penerima}}">
                                                        <input type="hidden" id="pengirim" name="pengirim" value="n6qIzE">
                                                        <input type="text" name="pesan" class="write_msg" placeholder="Ketik Pesan" />
                                                        <button class="msg_send_btn" type="submit"><i class="fa fa-send" aria-hidden="true"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@include('admin.layouts.footer')
@section('script')
                <script>
                    document.getElementById('penerima').value = '<?php (isset($penerima)) ? $penerima : "" ?>';
                </script>
@endsection
