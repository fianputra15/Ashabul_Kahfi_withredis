<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["nta","nama","tempat_lhr","tgl_lhr","alamat","thn_masuk","foto","id_anggota","kode_user"];
    public $timestamps = false;
    protected $table = "manggota";

    public function kategoriAnggota(){
        return $this->belongsTo(KategoriAnggota::class,'id_anggota','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'kode_user','kode_user');
    }
}
