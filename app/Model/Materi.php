<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ["kode_user","materi","foto","tgl_lhr","file_materi","id_kategori","title_materi"];
    public $timestamps = false;
    protected $table = "mmateri";

    public function kategori_anggota() {
        return $this->belongsTo(KategoriAnggota::class, 'id_kategori','id');
    }
}
