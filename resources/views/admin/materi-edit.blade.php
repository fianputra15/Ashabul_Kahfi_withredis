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
                            <h3 class="title-2">Edit Materi</h3><br>
                            <form action="{{route('update_materi',$materi['id'])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Judul Materi</label>
                                    <input type="text" class="form-control" name="title_materi" value="{{$materi['title_materi']}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi Materi</label>
                                    <textarea style="padding-left: 20px" name="materi" class="summernote" >
                                        {{$materi['materi']}}
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/png">
                                    <label for="">Gambar terupload</label> :
                                    @if(!isset($materi['file_materi']))
                                        <label for=""><b>Gambar Belum Ada</b></label>
                                    @endif
                                    <img class="img-140" src="{{asset('foto_materi/'.$materi['foto'])}}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Materi</label>
                                    <select name="kategori" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option {{($k->id === $materi["id"]) ? "selected" : "" }} value="{{$k->id}}">{{$k->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">File Materi</label>
                                    <input type="file" name="file_materi" class="form-control-file" accept="application/pdf, application/msword">
                                </div>
                                <label for="">File Terupload</label> :
                                @if(!isset($materi['file_materi']))
                                    <label for=""><b>File Belum Ada</b></label>
                                @endif
                                <a href="{{asset('file_materi/'.$materi['file_materi'])}}"></a>
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

