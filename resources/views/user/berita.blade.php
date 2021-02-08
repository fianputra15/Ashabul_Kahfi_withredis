@extends('user.template.template_content')
@section('content')
    <div class="container-fluid">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="">Filter Tanggal</label>
                    <select name="" id="date" class="form-control">
                        <option value="1">Januari {{date('Y')}}</option>
                        <option value="2">Februari {{date('Y')}}</option>
                        <option value="3">Maret {{date('Y')}}</option>
                        <option value="4">April {{date('Y')}}</option>
                        <option value="5">Mei {{date('Y')}}</option>
                        <option value="6">Juni {{date('Y')}}</option>
                        <option value="7">Juli {{date('Y')}}</option>
                        <option value="8">Agustus {{date('Y')}}</option>
                        <option value="9">September {{date('Y')}}</option>
                        <option value="10">Oktober {{date('Y')}}</option>
                        <option value="11">November {{date('Y')}}</option>
                        <option value="12">Desember {{date('Y')}}</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="kategori">Filter Kategori</label>
                    <select name="" id="kategori" class="form-control">
                        <option value="1">Umum </option>
                        <option value="2">Prestasi</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="berita-container">

        </div>
    </div>
    <br><br>
    <br>
@endsection
@section('script')
    <script>
        // <img src="${url}/foto_berita/${response[i].foto}" class="card-img-top" alt="...">
        var url = "http://localhost:8000";
        //First Reload
        document.getElementById("date").value = new Date().getMonth() + 1;
        fetch(url + "/get_berita/" + parseInt(new Date().getMonth()) + 1 + "/" + document.getElementById('kategori').value)
            .then(result => result.json())
            .then(response => {
                document.querySelector("#berita-container").innerHTML = ``;
                for (let i=0;i<response.length;i++){
                    document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                          <div class="card-group" ><div class="card m-2">
                             <div class="img-thumbnail" style="
                            background: url('${url}/foto_berita/${response[i].foto}');
                            background-size : cover;
                            background-position: center;
                            width: 100%;
                            height: 500px;
                            ">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">${response[i].judul}</h5>
                                <p class="card-text">${response[i].deskripsi}</p>

                                <strong>${response[i].updated_at}</strong><br>
                                <a href="${url}/berita/detail_berita/${response[i].id}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div></div>
                    `);
                }

                if(response.length === 0){
                    document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                        <div class="card-group">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Berita Belum Tersedia</h5>
                                </div>
                            </div>
                        </div>
                    `);

                }
            })


        document.getElementById("date").addEventListener("change",() => {
            document.querySelector("#berita-container").innerHTML = "";
            document.querySelector("#berita-container").insertAdjacentHTML("beforeend",
                `
                             <div class="card m-2">
                                   <div class="card-body">
                                      <h5 class="card-title">Loading...</h5>
                                   </div>
                                </div>
                        `
            );
            fetch(url + "/get_berita/" + document.getElementById("date").value +  "/" + document.getElementById("kategori").value)
                .then(result => result.json())
                .then(response => {
                    document.querySelector("#berita-container").innerHTML = ``;
                    for (let i=0;i<response.length;i++){
                        document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                          <div class="card-group" ><div class="card m-2">
                          <div class="img-thumbnail" style="
                            background: url('${url}/foto_berita/${response[i].foto}');
                            background-size : cover;
                            background-position: center;
                            width: 100%;
                            height: 500px;
                            ">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">${response[i].judul}</h5>
                                <p class="card-text">${response[i].deskripsi}</p>
                                <p class="card-text"> <b>Author : </b>${response[i].data_user.nama}</p>
                                <strong>${response[i].updated_at}</strong><br>
                                <a href="${url}/berita/detail_berita/${response[i].id}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div></div>
                    `);
                    }

                    if(response.length === 0){
                        document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                        <div class="card-group">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Berita Belum Tersedia</h5>
                                </div>
                            </div>
                        </div>
                    `);

                    }
                })
        })

        document.getElementById("kategori").addEventListener("change",() => {
            document.querySelector("#berita-container").innerHTML = "";
            document.querySelector("#berita-container").insertAdjacentHTML("beforeend",
                `
                             <div class="card m-2">
                                   <div class="card-body">
                                      <h5 class="card-title">Loading...</h5>
                                   </div>
                                </div>
                        `
            );
            fetch(url + "/get_berita/" + document.getElementById("date").value +  "/" + document.getElementById("kategori").value)
                .then(result => result.json())
                .then(response => {
                    document.querySelector("#berita-container").innerHTML = ``;
                    for (let i=0;i<response.length;i++){
                        document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                          <div class="card-group" ><div class="card m-2">
                          <div class="img-thumbnail" style="
                            background: url('${url}/foto_berita/${response[i].foto}');
                            background-size : cover;
                            background-position: center;
                            width: 100%;
                            height: 500px;
                            ">
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">${response[i].judul}</h5>
                                <p class="card-text">${response[i].deskripsi}</p>
                                <p class="card-text"> <b>Author : </b>${response[i].data_user.nama}</p>
                                <strong>${response[i].updated_at}</strong><br>
                                <a href="${url}/berita/detail_berita/${response[i].id}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div></div>
                    `);
                    }

                    if(response.length === 0){
                        document.querySelector("#berita-container").insertAdjacentHTML("beforeend",`
                        <div class="card-group">
                            <div class="card m-2">
                                <div class="card-body">
                                    <h5 class="card-title">Berita Belum Tersedia</h5>
                                </div>
                            </div>
                        </div>
                    `);

                    }
                })
        })
    </script>
@endsection

