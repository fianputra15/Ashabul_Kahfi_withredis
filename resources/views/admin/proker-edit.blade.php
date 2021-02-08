@include('admin.layouts.header')
@include('admin.layouts.sidebar')
            <!-- HEADER DESKTOP--><!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-2">Edit Program Kerja</h3><br>
                                        <form action="{{route('update_proker')}}" method="post" enctype="multipart/form-data">
                                            @csrf
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Deskripsi</label>--}}
{{--                                                <textarea class="form-control" name="deskripsi">{{$profile['deskripsi']}}</textarea>--}}
{{--                                            </div>--}}
                                            <textarea name="deskripsi" class="summernote">
                                                {!! $proker['deskripsi'] !!}
                                            </textarea><br>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

@section('script')
                            <script>
                                $('.summernote').summernote({
                                    height: 150,   //set editable area's height
                                });
                            </script>
@endsection
@include('admin.layouts.footer')
