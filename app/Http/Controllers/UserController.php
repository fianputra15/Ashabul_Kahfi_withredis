<?php

namespace App\Http\Controllers;

use App\Model\Anggota;
use App\Model\Berita;
use App\Model\Contact;
use App\Model\KategoriAnggota;
use App\Model\Materi;
use App\Model\Profiles;
use App\Model\Proker;
use App\Model\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $berita = Cache::remember('berita', 10 * 30, function () {
            return Berita::take(3)->get();
        });

        return view('user.home',compact('berita'));
    }

    public function berita(){
        $berita = Cache::remember('berita', 10 * 30, function () {
            return Berita::all();
        });
//        $berita = Berita::all();
        return view('user.berita',['berita' => $berita]);
    }

    public function get_materi($id){
//        $materi = Cache::remember("materi:", 100 * 60, function () use ($id) {
//            return Materi::with('author')->with('data_user')->where("kategori",$id)->get();
//        });
        $materi = Materi::where("id_kategori",$id)->get();
        return response()->json($materi);
//        return response()->json($materi);
    }

    public function materi(){

//        $materi = Materi::with('author')->get();
        $kategori = KategoriAnggota::all();
        return view('user.materi',compact('kategori'));
    }

    public function proker(){
        $proker = Proker::first();
        return view('user.proker',compact('proker'));
    }

    public function profile(){
        $profile = Profiles::first();
        return view('user.profile',compact('profile'));
    }

    public function profile_user($id){
        $anggota = Anggota::where("kode_user",$id)->first();
        return view('user.profile_user',compact('anggota'));
    }

    public function detail_berita($id){
        $berita = Cache::remember('berita_detail_'.$id, 10 * 30, function () use($id) {
            return Berita::where("id",$id)->first();
        });
//        $berita = Berita::where("id",$id)->first();
        return view('user.detail_berita',compact('berita'));
    }

    public function detail_materi($id){
        $materi = Materi::where("id",$id)->first();
        return view('user.detail_materi',compact('materi'));
    }

    public function pendaftaran(){
        return view('pendaftaran_calon');
    }

    public function dummyMateri(){
        for ($i=0;$i < 5000;$i++){
            $data = array(
                "kode_user" => "MNUrPu",
                "materi" => Str::random('16'),
                "foto" =>  "logo.jpeg",
                "kategori" => "umum",
                "title_materi" => Str::random('8')
            );
            $materi = new Materi();
            $materi->fill($data);
            $materi->save();
        }
    }

    public function update_profile(Request $request){
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_anggota/",$files->getClientOriginalName())){
                $user = User::where("email",$request->email)->first();
                $kode_user = $user->first()->kode_user;
                $data_user = Anggota::where("kode_user",$kode_user)->first();

                $user->email = $request->email;
                $user->no_telp = $request->telp;
                $user->save();

                $data_user->nta = $request->nta;
                $data_user->nama = $request->nama;
                $data_user->tempat_lhr = $request->tempat;
                $data_user->tgl_lhr = $request->tanggal;
                $data_user->alamat = $request->alamat;
                $data_user->thn_masuk = $request->angkatan;
                $data_user->foto = $files->getClientOriginalName();
                $data_user->save();
                return response()->json([
                        "status" => "200",
                        "message" => "Berhasil"]
                );
            }else{
                return response()->json([
                        "status" => "400",
                        "message" => "Gagal Ubah Data"]
                );
            }
        }else{
            $user = User::where("email",$request->email)->first();
            $kode_user = $user->first()->kode_user;
            $data_user = Anggota::where("kode_user",$kode_user)->first();

            $user->email = $request->email;
            $user->no_telp = $request->telp;
            $user->save();

            $data_user->nta = $request->nta;
            $data_user->nama = $request->nama;
            $data_user->tempat_lhr = $request->tempat;
            $data_user->tgl_lhr = $request->tanggal;
            $data_user->alamat = $request->alamat;
            $data_user->thn_masuk = $request->angkatan;
            $data_user->save();
            return response()->json([
                    "status" => "200",
                    "message" => "Berhasil"]
            );
        }
    }

    public function get_berita($id,$kategori){
        $berita = Cache::remember('berita__'.$id."_".$kategori, 10 * 30, function () use($id,$kategori) {
            $berita = Berita::whereMonth("updated_at",$id)->where("id_kategori",$kategori)->with('dataUser')->get();
            return $berita;
        });
        return response()->json($berita);
    }


    public function contact_store(Request $request){
        $data = array(
            "nama" => $request->nama,
            "email" => $request->email,
            "no_telp" => $request->no_telp,
            "pesan" => $request->pesan
        );
        $contact = new Contact();
        $contact->fill($data);
        if($contact->save()){
            return redirect('/')->with('berhasil','Berhasil Mengirim Pesan');
        }
    }

    public function chat(){
        $chat_detail = DB::table('tchat')
            ->join('manggota as pengirim','tchat.kode_pengirim','=','pengirim.kode_user')
            ->join('manggota as penerima','tchat.kode_penerima','=','penerima.kode_user')
            ->select('tchat.kode_pengirim','tchat.kode_penerima','tchat.id','tchat.pesan','tchat.kode_penerima','tchat.created_at','pengirim.nama','pengirim.foto','penerima.nama','pengirim.nama')
            ->where('tchat.kode_pengirim','=','n6qIzE')
            ->orWhere('tchat.kode_pengirim','=',session()->get('users')['kode_user'])
            ->orderBy('tchat.created_at','asc')
            ->get();
        return view('user.chat',compact('chat_detail'));
    }
}
