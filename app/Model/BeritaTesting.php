<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeritaTesting extends Model
{
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "mberita_testing";
    protected $fillable = ["deskripsi","foto","judul","author","id_kategori"];

    public function dataUser(){
        return $this->belongsTo(Anggota::class,'author','kode_user');
    }

    public function dataKategori(){
        return $this->belongsTo(KategoriBerita::class,'id_kategori','id');
    }
}
