@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2 class="d-inline">{{$anggota->nama}}</h2>
                <button id="edit-btn-on" style="margin-bottom: 10px;" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profile</button>
                <br><br>
                <div class="row">
                    <div class="col">
                        <img class="img-thumbnail" style="width: 100%" src="{{asset('foto_anggota/'.$anggota->foto)}}" alt="">
                    </div>
                    <div class="col" id="container">
                        <h5 style="font-weight: bold">Nomor Tanda Anggota</h5>
                        <p>{{$anggota->nta}}</p>
                        <h5 style="font-weight: bold">Nama Lengkap</h5>
                        <p>{{$anggota->nama}}</p>
                        <h5 style="font-weight: bold">Tempat & Tanggal Lahir</h5>
                        <p>{{$anggota->tempat_lhr}}, {{$anggota->tgl_lhr}}</p>
                        <h5 style="font-weight: bold">Alamat</h5>
                        <p>{{$anggota->alamat}}</p>
                        <h5 style="font-weight: bold">Angkatan</h5>
                        <p>{{$anggota->thn_masuk}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
@section('script')
    <script>
        // const edit_btn = document.querySelector("#edit-btn");
        const container = document.querySelector("#container");
        if(document.querySelector("#edit-btn-on")){
            document.querySelector("#edit-btn-on").addEventListener("click",(event) => {
                event.target.id = "edit-btn-off";
                container.innerHTML = ``;
                container.insertAdjacentHTML("beforeend",`
                        <h6 style="font-weight: bold">Nomor Tanda Anggota</h6>
                        <input class="form-control" id="nta" type="number" value="<?php echo $anggota->nta ?>">
                        <h6 style="font-weight: bold">Nama Lengkap</h6>
                        <input class="form-control" id="nama" type="text" value="<?php echo $anggota->nama ?>">
                        <h6 style="font-weight: bold">No Telepon</h6>
                        <input class="form-control" id="telp" type="number" value="<?php echo $anggota->user->no_telp ?>">
                        <h6 style="font-weight: bold">Email</h6>
                        <input class="form-control" id="email" type="email" value="<?php echo $anggota->user->email ?>">
                        <h6 style="font-weight: bold">Tempat & Tanggal Lahir</h6>
                        <input class="form-control" style="margin-bottom: 5px;" id="tempat" type="text" value="<?php echo $anggota->tempat_lhr ?>">
                        <input class="form-control" id="tanggal" type="date" value="<?php echo $anggota->tgl_lhr ?>">
                        <h6 style="font-weight: bold">Alamat</h6>
                        <textarea class="form-control" id="alamat"><?php echo $anggota->alamat ?></textarea>
                        <h6 style="font-weight: bold">Angkatan</h6>
                        <input class="form-control" id="angkatan" type="number" value="<?php echo $anggota->thn_masuk ?>">
                        <h6 style="font-weight: bold">Foto</h6>
                        <input class="form-control" id="foto" type="file">
                        <button class="btn btn-primary" style="margin-top:5px" id="submit"><i class="fas fa-save"></i> Simpan</button>
                `);

                document.querySelector("#submit").addEventListener("click",(event) => {
                    let formdata = new FormData();
                    formdata.append("nta",document.getElementById("nta").value);
                    formdata.append("nama",document.getElementById("nama").value);
                    formdata.append("telp",document.getElementById("telp").value);
                    formdata.append("email",document.getElementById("email").value);
                    formdata.append("tempat",document.getElementById("tempat").value);
                    formdata.append("tanggal",document.getElementById("tanggal").value);
                    formdata.append("alamat",document.getElementById("alamat").value);
                    formdata.append("angkatan",document.getElementById("angkatan").value);
                    formdata.append("foto",document.getElementById("foto").files[0]);
                    formdata.append('_token', "<?php echo csrf_token() ?>");
                    fetch('http://127.0.0.1:8000/update_profile_user',{
                        method : "POST",
                        body : formdata
                    }).then(response => response.json())
                        .then(result => {
                            if (result.status == '200'){
                                alert("Berhasil Memperbarui Profil")
                                window.location.reload();
                            }
                        });
                })
            });
        }
    </script>
    <script>

        {{--if(document.querySelector("#edit-btn-off"))--}}
        {{--{--}}
        {{--    document.querySelector("#edit-btn-off").addEventListener("click",(event) => {--}}
        {{--        event.target.id = "edit-btn-on";--}}
        {{--        container.innerHTML = ``;--}}
        {{--        container.insertAdjacentHTML("beforeend",`--}}
        {{--         <div class="col" id="container">--}}
        {{--                <h5 style="font-weight: bold">Nomor Tanda Anggota</h5>--}}
        {{--                <p><?php echo $anggota->nta ?></p>--}}
        {{--                <h5 style="font-weight: bold">Nama Lengkap</h5>--}}
        {{--                <p><?php echo $anggota->nama ?></p>--}}
        {{--                <h5 style="font-weight: bold">Tempat & Tanggal Lahir</h5>--}}
        {{--                <p><?php echo $anggota->tempat_lhr?>, <?php echo $anggota->tgl_lhr?></p>--}}
        {{--                <h5 style="font-weight: bold">Alamat</h5>--}}
        {{--                <p><?php echo $anggota->alamat?></p>--}}
        {{--                <h5 style="font-weight: bold">Angkatan</h5>--}}
        {{--                <p><?php echo $anggota->thn_masuk?></p>--}}
        {{--            </div>--}}
        {{--        `);--}}
        {{--    });--}}
        {{--}--}}
    </script>
@endsection

