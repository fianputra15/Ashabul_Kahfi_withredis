<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategoriAnggota extends Model
{
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "mkategori_anggota";
    protected $fillable = ['materi','foto','title_materi','kategori'];

}
