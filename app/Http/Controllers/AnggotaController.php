<?php

namespace App\Http\Controllers;

use App\Model\Calon;
use Illuminate\Http\Request;
use App\Model\Anggota;
use Illuminate\Support\Facades\Redirect;

class AnggotaController extends Controller
{
    public function store_anggotabaru(Request $request){
        $calon = new Calon();
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_calonanggota/",$files->getClientOriginalName())){
                $data = array(
                    "nama" => $request->nama,
                    "no_telp" => $request->no_telp,
                    "email" => $request->email,
                    "thn_masuk" => date('y'),
                    "tgl_lhr" => $request->tanggal_lahir,
                    "tempat_lhr" => $request->tempat,
                    "alamat" => $request->alamat,
                    "foto" => $files->getClientOriginalName()
                );
                $calon->fill($data);
                $calon->save();
                return Redirect::route('pendaftaran')->with('berhasil',"sukses");
            }else{
                return Redirect::route('pendaftaran')->with('gagal',"gagal");
            }
        }
    }

    public function calon_anggota(){
        $calon = Calon::all();
        return view('admin.calon_anggota',compact('calon'));
    }


    public function delete_calon($id){
        $deleted = Calon::where("id",$id)->delete();
        if($deleted){
            return Redirect::route('calon_anggota');
        }else{
            return Redirect::route('calon_anggota');
        }
    }
}
