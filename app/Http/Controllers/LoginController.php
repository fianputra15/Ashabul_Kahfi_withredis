<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Model\Anggota;
class LoginController extends Controller
{

    public function index(){
        return view('login');
    }

    public function verify(Request $request){
        $user = User::where("email",$request->username)->orWhere("no_telp",$request->username)->first();
        if($user === null) {
            return redirect('login')->with('gagal','Email/No Telepon atau Password Salah');
        }
        if(Hash::check($request->password,$user['password'])){
            $data = array(
                "kode_user" => $user['kode_user'],
                "email" => $user['email'],
                "status" => $user['status'],
                "nama" => $user->data_user['nama'],
                "no_telp" => $user['no_telp']
            );
            $request->session()->put('users',$data);
            switch ($user['status']){
                case "1" :  return Redirect::route('admin');
                break;
                case "0" : return Redirect::route('home');
                break;
            }
        }else{
            return redirect('login')->with('gagal','Email/No Telepon atau Password Salah');
        }
    }

    public function logout(Request $request){
        $request->session()->remove('users');
        return redirect('login');
    }

    public function register_dummy(){
        $kode_user = Str::random(6);
        $user = array(
            "email" => "admin@gmail.com",
            "no_telp" => "-",
            "kode_user" => $kode_user,
            "status" => 1,
            "password" => Hash::make("admin123")
        );
        $data_user = array(
            'kode_user' => $kode_user,
            "nta" => "-",
            "nama" => "admin",
            "tempat_lhr" => "-",
            "tgl_lhr" => "-",
            "alamat" => "-",
            "id_anggota" => "1",
            "foto" => "-"
        );

        $new_user = new User();
        $new_datauser = new Anggota();

        $new_user->fill($user);
        $new_datauser->fill($data_user);

        if($new_user->save()){
            if($new_datauser->save()){
                die("Berhasil");
            }
        }else{
            die("Gagal");
        }
    }
}
