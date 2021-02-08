<?php

namespace App\Http\Controllers;

use App\Model\Anggota;
use App\Model\Berita;
use App\Model\Calon;
use App\Model\Chat;
use App\Model\Contact;
use App\Model\Materi;
use App\Model\Profiles;
use App\Model\Proker;
use Illuminate\Http\Request;
use App\Model\KategoriAnggota;
use App\Model\KategoriBerita;
use Illuminate\Support\Facades\Cache;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        $anggota = Anggota::all()->count();
        $calon_anggota = Calon::all()->count();
        $materi = Materi::all()->count();
        $berita = Berita::all()->count();
        return view('admin.home',compact('anggota','calon_anggota','berita','materi'));
    }

    //Profile
    public function profile(){
        $profile = Profiles::first();
        return view('admin.profile',compact('profile'));
    }

    public function edit_profile(){
        $profile = Profiles::first();
        return view('admin.profile-edit',compact('profile'));
    }

    public function update_profile(Request $request){
        $profile = Profiles::first();
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("image/",$files->getClientOriginalName())){
                $profile->foto = $files->getClientOriginalName();
                $profile->deskripsi = $request->deskripsi;
                $profile->save();
                return Redirect::route('admin_profile')->with('berhasil','Berhasil Memperbaharui Profil');
            }else{
                return Redirect::route('admin_profile')->with('gagal','Gagal Memperbaharui Profil');
            }
        }else{
            $profile->deskripsi = $request->deskripsi;
            $profile->save();
            return Redirect::route('admin_profile')->with('berhasil','Berhasil Memperbaharui Program Kerja');
        }
    }


    //Proker
    public function proker(){
        $proker = Proker::first();
        return view('admin.proker',compact('proker'));
    }

    public function edit_proker(){
        $proker = Proker::first();
        return view('admin.proker-edit',compact('proker'));
    }

    public function update_proker(Request $request){
        $proker = Proker::first();
        $proker->deskripsi = $request->deskripsi;
        if($proker->save()){
            return Redirect::route('admin_proker')->with('berhasil','Berhasil Memperbaharui Program Kerja');
        }else{
            return Redirect::route('admin_proker')->with('berhasil','Gagal Memperbaharui Program Kerja');
        }
    }

    //Materi
    public function materi(){
        $materi = Materi::all();
        return view('admin.materi',compact('materi'));
    }

    public function update_materi($id,Request $request){
        $materi = Materi::where("id",$id)->first();
        $files = $request->file('foto');
        $file_materi = $request->file('file_materi');
        if(isset($file_materi)){
            $file_materi->move("file_materi/",$file_materi->getClientOriginalName());
            if(isset($files)){
                if($files->move("foto_materi/",$files->getClientOriginalName())){
                    $materi->foto = $files->getClientOriginalName();
                    $materi->id_kategori = $request->kategori;
                    $materi->file_materi = $file_materi->getClientOriginalName();
                    $materi->title_materi = $request->title_materi;
                    $materi->materi = $request->materi;
                    $materi->save();
                    return Redirect::route('admin_materi')->with('berhasil','Berhasil Memperbaharui Materi');
                }else{
                    return Redirect::route('admin_materi')->with('gagal','Gagal Memperbaharui Materi');
                }
            }else{
                $materi->id_kategori = $request->kategori;
                $materi->file_materi = $file_materi->getClientOriginalName();
                $materi->title_materi = $request->title_materi;
                $materi->materi = $request->materi;
                $materi->save();
                return Redirect::route('admin_materi')->with('berhasil','Berhasil Memperbaharui Materi');
            }
        }else{
            if(isset($files)){
                if($files->move("foto_materi/",$files->getClientOriginalName())){
                    $materi->foto = $files->getClientOriginalName();
                    $materi->id_kategori = $request->kategori;
                    $materi->title_materi = $request->title_materi;
                    $materi->materi = $request->materi;
                    $materi->save();
                    return Redirect::route('admin_materi')->with('berhasil','Berhasil Memperbaharui Materi');
                }else{
                    return Redirect::route('admin_materi')->with('gagal','Gagal Memperbaharui Materi');
                }
            }else{
                $materi->id_kategori = $request->kategori;
                $materi->title_materi = $request->title_materi;
                $materi->materi = $request->materi;
                $materi->save();
                return Redirect::route('admin_materi')->with('berhasil','Berhasil Memperbaharui Materi');
            }
        }
    }

    public function edit_materi($id){
        $kategori = KategoriAnggota::all();
        $materi = Materi::where("id",$id)->first();
        return view('admin.materi-edit',compact('materi','kategori'));
    }

    public function tambah_materi(){
        $kategori = KategoriAnggota::all();
        return view('admin.materi-add',compact('kategori'));
    }
    public function store_materi(Request $request){
        $materi = new Materi();
        $file_materi = $request->file('file_materi');
        $files = $request->file('foto');
        if(isset($file_materi)){
            $file_materi->move("file_materi/",$file_materi->getClientOriginalName());
            if(isset($files)){
                if($files->move("foto_materi/",$files->getClientOriginalName())){
                    $data = array(
                        "title_materi" => $request->title_materi,
                        "materi" => $request->materi,
                        "id_kategori" => $request->kategori,
                        "foto" => $files->getClientOriginalName(),
                        "file_Materi" => $file_materi->getClientOriginalName()
                    );
                    $materi->fill($data);
                    $materi->save();
                    return Redirect::route('admin_materi')->with('berhasil','Berhasil Menambahkan Materi');
                }else{
                    return Redirect::route('admin_materi')->with('gagal','Gagal Menambahkan Materi');
                }
            }else{
                $data = array(
                    "title_materi" => $request->title_materi,
                    "materi" => $request->materi,
                    "id_kategori" => $request->kategori,
                    "file_Materi" => $file_materi->getClientOriginalName()
                );
                $materi->fill($data);
                $materi->save();
                return Redirect::route('admin_materi')->with('berhasil','Berhasil Menambahkan Materi');
            }
        }else{
            if(isset($files)){
                if($files->move("foto_materi/",$files->getClientOriginalName())){
                    $data = array(
                        "title_materi" => $request->title_materi,
                        "materi" => $request->materi,
                        "id_kategori" => $request->kategori,
                        "foto" => $files->getClientOriginalName()
                    );
                    $materi->fill($data);
                    $materi->save();
                    return Redirect::route('admin_materi')->with('berhasil','Berhasil Menambahkan Materi');
                }else{
                    return Redirect::route('admin_materi')->with('gagal','Gagal Menambahkan Materi');
                }
            }else{
                $data = array(
                    "title_materi" => $request->title_materi,
                    "materi" => $request->materi,
                    "id_kategori" => $request->kategori
                );
                $materi->fill($data);
                $materi->save();
                return Redirect::route('admin_materi')->with('berhasil','Berhasil Menambahkan Materi');
            }
        }
//        return Redirect::route('admin_materi');
    }

    public function delete_materi($id){
        $deleted = Materi::where("id",$id)->delete();
        if($deleted){
            return Redirect::route('admin_materi')->with('berhasil','Berhasil Menghapus Materi');
        }else{
            return Redirect::route('admin_materi')->with('gagal','Gagal Menghapus Materi');
        }
    }

    //Berita
    public function berita(){
//        $berita = Cache::remember("brt", 10 * 30, function () {
//            return Berita::all();
//        });
        $berita = Berita::all();
//        $berita = Cache::remember("berita", 10 * 30, function () {
//            return Berita::all();
//        });
//        return response()->json($berita);
        return view('admin.berita',compact('berita'));
    }

    public function delete_berita($id){
        $deleted = Berita::where("id",$id)->delete();
        if($deleted){
            return Redirect::route('admin_berita')->with('berhasil','Berhasil Menghapus Berita');
        }else{
            return Redirect::route('admin_berita')->with('gagal','Gagal Menghapus Berita');
        }
    }
    public function tambah_berita(){
        $kategori = KategoriBerita::all();
        return view('admin.berita-add',compact('kategori'));
    }

    public function store_berita(Request $request){
        $berita = new Berita();
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_berita/",$files->getClientOriginalName())){
                $data = array(
                    "judul" => $request->judul,
                    "deskripsi" => $request->deskripsi,
                    "foto" => $files->getClientOriginalName(),
                    "id_kategori" => $request->kategori,
                    "author" => session()->get('users')['kode_user']
                );
                $berita->fill($data);
                $berita->save();
                return Redirect::route('admin_berita')->with('berhasil','Berhasil Menambahkan Berita');
            }else{
                return Redirect::route('admin_berita')->with('gagal','Gagal Menambahkan Berita');
            }
        }else{
            $data = array(
                "judul" => $request->judul,
                "deskripsi" => $request->deskripsi,
                "foto" => "logo.jpeg"
            );
            $berita->fill($data);
            $berita->save();
            return Redirect::route('admin_berita')->with('berhasil','Berhasil Menambahkan Berita');
        }
        return Redirect::route('admin_materi')->with('gagal','Gagal Menambahkan Berita');
    }

    public function update_berita($id,Request $request){
        $berita = Berita::where("id",$id)->first();
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_berita/",$files->getClientOriginalName())){
                $berita->foto = $files->getClientOriginalName();
                $berita->judul = $request->judul;
                $berita->deskripsi = $request->deskripsi;
                $berita->save();
                return Redirect::route('admin_berita')->with('berhasil','Berhasil Memperbarui Berita');
            }else{
                return Redirect::route('admin_berita')->with('gagal','Gagal Memperbarui Berita');
            }
        }else{
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->deskripsi;
            $berita->save();
            return Redirect::route('admin_berita')->with('berhasil','Berhasil Memperbarui Berita');
        }
    }

    public function edit_berita($id){
        $berita = Berita::where("id",$id)->first();
        return view('admin.berita-edit',compact('berita'));
    }

    //Anggota
    public function anggota(){
        $anggota = Anggota::all();
        return view('admin.anggota',compact('anggota'));
    }

    public function delete_anggota($id){
        $deleted = User::where("kode_user",$id)->delete();
        if($deleted){
            $deleled_anggota = Anggota::where("kode_user",$id)->delete();
            return Redirect::route('admin_anggota')->with('berhasil','Berhasil Menghapus Anggota');
        }else{
            return Redirect::route('admin_anggota')->with('gagal','Gagal Menghapus Anggota');
        }
    }

    public function tambah_anggota(){
        $kategori = KategoriAnggota::all();
        return view('admin.anggota-add',compact('kategori'));
    }

    public function store_anggota(Request $request){
        $anggota = new Anggota();
        $user = new User();
        $kode_user = Str::random('6');
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_anggota/",$files->getClientOriginalName())){
                $data = array(
                    "kode_user" => $kode_user,
                    "email" => $request->email,
                    "status" => 0,
                    "no_telp" => $request->telp,
                    "password" => Hash::make('123456')
                );
                $user->fill($data);
                if($user->save()){
                    $data_user = array(
                        "kode_user" => $kode_user,
                        "nta" => $request->nta,
                        "nama" => $request->nama,
                        "tempat_lhr" =>$request->tempat,
                        "tgl_lhr" =>$request->tanggal_lahir,
                        "alamat" => $request->alamat,
                        "id_anggota" =>$request->kategori_anggota,
                        "thn_masuk" => date('y'),
                        "foto" => $files->getClientOriginalName()
                    );
                    $anggota->fill($data_user);
                    if ($anggota->save()){
                        return Redirect::route('admin_anggota')->with('berhasil','Berhasil Menambahkan Anggota');
                    }
                }
            }else{
                return Redirect::route('admin_anggota')->with('gagal','gagal Menambahkan');
            }
        }else{
            return Redirect::route('admin_anggota')->with('gagal','gagal Menambahkan');
        }
    }

    public function edit_anggota($id){
        $anggota = Anggota::where("kode_user",$id)->with('user')->first();
        $kategori = KategoriAnggota::all();
        return view('admin.anggota-edit',compact('anggota','kategori'));
    }

    public function update_anggota($id,Request $request){
        $files = $request->file('foto');
        if(isset($files)){
            if($files->move("foto_anggota/",$files->getClientOriginalName())){
                $anggota = Anggota::where('kode_user',$id)->first();
                $user = User::where("kode_user",$id)->first();
                $user->email = $request->email;
                $user->no_telp = $request->telp;
                $user->save();
                $anggota->nta = $request->nta;
                $anggota->nama = $request->nama;
                $anggota->tempat_lhr = $request->tempat;
                $anggota->tgl_lhr = $request->tanggal_lahir;
                $anggota->alamat = $request->alamat;
                $anggota->id_anggota = $request->kategori_anggota;
                $anggota->foto = $files->getClientOriginalName();
                $anggota->save();
                return Redirect::route('admin_anggota')->with('berhasil','Berhasil Memperbarui Data Anggota');
            }else{
                return Redirect::route('admin_anggota')->with('gagal','Gagal Memperbarui Data Anggota');
            }
        }else{
            $anggota = Anggota::where('kode_user',$id)->first();
            $user = User::where("kode_user",$id)->first();
            $user->email = $request->email;
            $user->no_telp = $request->telp;
            if($user->save()){
                $anggota->nta = $request->nta;
                $anggota->nama = $request->nama;
                $anggota->tempat_lhr = $request->tempat;
                $anggota->tgl_lhr = $request->tanggal_lahir;
                $anggota->alamat = $request->alamat;
                $anggota->id_anggota = $request->kategori_anggota;
                if ($anggota->save()){
                    return Redirect::route('admin_anggota')->with('berhasil','Berhasil Memperbarui Data Anggota');
                }
            }
            return Redirect::route('admin_anggota')->with('gagal','Gagal Memperbarui Data Anggota');
        }
    }

    public function contact_admin(){
        $contact = Contact::all();
        return view('admin.contact',compact('contact'));
    }

    public function chat(){
        $list_contact = Anggota::where('kode_user','!=','n6qIzE')->get();
//        $chat = Anggota::where('kode_user','!=','n6qIzE')->get();
        $chat = DB::table('tchat')
                ->join('manggota','tchat.kode_pengirim','=','manggota.kode_user')
                ->select('tchat.kode_pengirim','tchat.status','tchat.id','tchat.pesan','tchat.kode_penerima','tchat.created_at','manggota.nama','manggota.kode_user','manggota.foto')
                ->where('tchat.kode_pengirim','!=','n6qIzE')
                ->latest('tchat.created_at')
                ->where('tchat.status','=','0')
                ->orderBy('manggota.nama','asc')
                ->get();
        return view('admin.chat',compact('chat','list_contact'));
    }

    public function get_chat($id,$id_chat){
        $list_contact = Anggota::where('kode_user','!=','n6qIzE')->get();
        if($id_chat !== "none"){
            //Set Read
            $chats = Chat::where('id',$id_chat)->first();
            $chats->status = 1;
            $chats->save();
        }
//        $chat = Anggota::where('kode_user','!=','n6qIzE')->get();
        $chat = DB::table('tchat')
            ->join('manggota','tchat.kode_pengirim','=','manggota.kode_user')
            ->select('tchat.kode_pengirim','tchat.status','tchat.id','tchat.pesan','tchat.kode_penerima','tchat.created_at','manggota.nama','manggota.kode_user','manggota.foto')
            ->where('tchat.kode_pengirim','!=','n6qIzE')
            ->latest('tchat.created_at')
            ->where('tchat.status','=','0')
            ->orderBy('manggota.nama','asc')
            ->get();


        $penerima = $id;

        $chat_detail = DB::table('tchat')
            ->join('manggota as pengirim','tchat.kode_pengirim','=','pengirim.kode_user')
            ->join('manggota as penerima','tchat.kode_penerima','=','penerima.kode_user')
            ->select('tchat.kode_pengirim','tchat.kode_penerima','tchat.id','tchat.pesan','tchat.kode_penerima','tchat.created_at','pengirim.nama','pengirim.foto','penerima.nama','pengirim.nama')
            ->where('tchat.kode_penerima','=',$id)
            ->orderBy('tchat.created_at','asc')
            ->orWhere('tchat.kode_pengirim','=',$id)
            ->get();
        return view('admin.chat',compact('chat_detail','chat','penerima','list_contact'));
    }


    public function store_chat(Request $request){
        $data = array(
          "kode_pengirim" => $request->pengirim,
          "kode_penerima" => $request->penerima,
          "pesan" => $request->pesan,
        );

        $chat = new Chat();
        $chat->fill($data);
        $chat->save();
        return Redirect::back();
    }
}
