<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "mkategori_berita";
    protected $fillable = ['kategori'];
}
