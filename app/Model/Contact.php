<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $table = "mcontact";
    protected $fillable = ["nama","email","no_telp","pesan"];

}
