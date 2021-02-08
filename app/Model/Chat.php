<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "tchat";
    protected $fillable = ["kode_pengirim","kode_penerima","pesan","status"];

}
