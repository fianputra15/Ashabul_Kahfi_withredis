<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["nama","no_telp","email","tempat_lhr","tgl_lhr","alamat","thn_masuk","foto"];
    public $timestamps = false;
    protected $table = "mcalon";
}
