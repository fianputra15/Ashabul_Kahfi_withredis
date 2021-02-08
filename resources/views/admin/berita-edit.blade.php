@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<!-- HEADER DESKTOP--><!-- MAIN CONTENT-->
<style>
    .cke_wrapper {
        padding-left: 10px;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="au-card recent-report">
                        <div class="au-card-inner">
                            <h3 class="title-2">Edit Berita</h3><br>
                            <form action="{{route('update_berita',$berita['id'])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Judul Berita</label>
                                    <input type="text" class="form-control" name="judul" value="{{$berita['judul']}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi Berita</label>
                                    <textarea style="padding-left: 20px" name="deskripsi" class="summernote" >
                                        {{$berita['deskripsi']}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/png">
                                    <label for="">Gambar terupload</label>
                                    <br>
                                    <img class="img" src="{{asset('foto_berita/'.$berita['foto'])}}" alt="">
                                </div>
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

