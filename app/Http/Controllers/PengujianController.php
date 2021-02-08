<?php

namespace App\Http\Controllers;

use App\Model\Berita;
use App\Model\BeritaTesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PengujianController extends Controller
{
    public function berita(){
        $berita = BeritaTesting::with('dataUser')->with('dataKategori')->get();
//        $berita = DB::raw('select * from mberita');
        return response()->json($berita);
    }

    public function berita_withredis(){
        $berita = Cache::remember('beritaa', 10 * 30, function () {
            $berita = BeritaTesting::with('dataUser')->with('dataKategori')->get();
            return $berita;
        });
        return response()->json($berita);
    }

    public function berita_id($id,$kategori){
        $berita = Cache::remember('berita__'.$id."_".$kategori, 10 * 30, function () use($id,$kategori) {
            $berita = BeritaTesting::whereMonth("updated_at",$id)->where("id_kategori",$kategori)->with('dataUser')->with('dataKategori')->get();
            return $berita;
        });
        return response()->json($berita);
    }

    public function berita_withredis_id($id,$kategori){
        $berita = Cache::remember('berita__'.$id."_".$kategori, 10 * 30, function () use($id,$kategori) {
            $berita = BeritaTesting::whereMonth("updated_at",$id)->where("id_kategori",$kategori)->with('dataKategori')->with('dataUser')->get();
            return $berita;
        });
        return response()->json($berita);
    }
}
