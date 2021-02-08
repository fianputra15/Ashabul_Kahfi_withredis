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
                                        <h3 class="title-2">Tambah Anggota</h3><br>
                                        <form action="{{route('store_anggota')}}" method="post" enctype="multipart/form-data">
                                            @csrf
{{--                                            <div class="form-group">--}}
{{--                                                <label for="">Deskripsi</label>--}}
{{--                                                <textarea class="form-control" name="deskripsi">{{$profile['deskripsi']}}</textarea>--}}
{{--                                            </div>--}}
                                            <div class="form-group">
                                                <label for="">NTA</label>
                                                <input type="number" class="form-control" name="nta" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat & Tanggal Lahir</label>
                                                <input required type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
                                                <input required type="date" name="tanggal_lahir" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">No Telp *<b>Disarankan mempunyai Whatsapp</b></label>
                                                <input type="number" class="form-control" name="telp" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea style="padding-left: 20px" name="alamat" class="form-control">

                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input type="file" name="foto" class="form-control-file" required accept="image/jpeg, image/png">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select name="kategori_anggota" class="form-control">
                                                    <option value="">-</option>
                                                    @foreach($kategori as $k)
                                                        @if($k->kategori != "umum" and $k->kategori != "siaga"  and $k->kategori != "petunjuk" and $k->kategori != "pandega" and $k->kategori != "pelatih" and $k->kategori != "penggalang" )
                                                            <option value="{{$k->id}}">{{$k->kategori}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
