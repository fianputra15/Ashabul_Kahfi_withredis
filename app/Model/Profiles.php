<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["deskripsi","foto"];
    public $timestamps = false;
    protected $table = "mprofile";

}
