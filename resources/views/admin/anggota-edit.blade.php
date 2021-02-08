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
                                        <h3 class="title-2">Edit Anggota</h3><br>
                                        <form action="{{route('update_anggota',$anggota['kode_user'])}}" method="post" enctype="multipart/form-data">
                                            @csrf
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Deskripsi</label>--}}
{{--                                                <textarea class="form-control" name="deskripsi">{{$profile['deskripsi']}}</textarea>--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <label for="">NTA</label>
                                                <input type="number" class="form-control" name="nta" required value="{{$anggota['nta']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" required value="{{$anggota['nama']}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat & Tanggal Lahir</label>
                                                <input required type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" value="{{$anggota['tempat_lhr']}}">
                                                <input required type="date" name="tanggal_lahir" class="form-control" value="{{$anggota['tgl_lhr']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" required value="{{$anggota->user['email']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Telp *<b>Disarankan mempunyai Whatsapp</b></label>
                                                <input type="number" class="form-control" name="telp" required value="{{$anggota->user['no_telp']}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea style="padding-left: 20px" name="alamat" class="form-control">{{$anggota['alamat']}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/png">
                                                <label for="">Gambar terupload</label>
                                                <br>
                                                <img class="img" src="{{asset('foto_anggota/'.$anggota['foto'])}}" alt="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select name="kategori_anggota" class="form-control">
                                                    <option value="">-</option>
                                                    @foreach($kategori as $k)
                                                        @if($k->id != 1)
                                                            <option {{($k->id === $anggota['id_anggota']) ? "selected" : ""}} value="{{$k->id}}">{{$k->kategori}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
