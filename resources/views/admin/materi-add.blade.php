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
                                        <h3 class="title-2">Tambah Materi</h3><br>
                                        <form action="{{route('store_materi')}}" method="post" enctype="multipart/form-data">
                                            @csrf
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Deskripsi</label>--}}
{{--                                                <textarea class="form-control" name="deskripsi">{{$profile['deskripsi']}}</textarea>--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <label for="">Judul Materi</label>
                                                <input type="text" class="form-control" name="title_materi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Deskripsi Materi</label>
                                                <textarea style="padding-left: 20px" name="materi" class="summernote" required>

                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/png">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori Materi</label>
                                                <select name="kategori" class="form-control" required>
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach($kategori as $k)
                                                        <option value="{{$k->id}}">{{$k->kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">File Materi</label>
                                                <input type="file" name="file_materi" class="form-control-file" accept="application/pdf, application/msword">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Tambah</button>
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
