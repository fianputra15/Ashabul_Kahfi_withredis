<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["email","password","no_telp","kode_user","status"];
    public $timestamps = false;
    protected $table = "muser";

    public function data_user(){
        return $this->belongsTo(Anggota::class,"kode_user","kode_user");
    }
}
