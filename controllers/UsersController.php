<?php 

namespace App\Controllers;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Http\Controller;
use AbieSoft\Application\Http\Lanjut;
use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Generate;
use AbieSoft\Application\Utilities\Guard;
use AbieSoft\Application\Utilities\Input;
use AbieSoft\Application\Utilities\Metafile;
use App\Models\Grup;
use App\Models\Users;

class UsersController extends Controller
{

    public function index()
    {
        $user = new Authentication;

        if($user->getNamaGrup() != "Administrator") {
            Lanjut::ke('/');
        }
        
        $this->view('users/index', [
            'title' => 'Users',
            'totalusers' => Users::all(output: 'hitung')
        ]);
    }

    public function table()
    {
        /*
            Defaultnya function ini digunakan untuk meload data tabel
            yang digunakan untuk function index
        */
    }

    public function add()
    {
        $user = new Authentication;

        if($user->getNamaGrup() != "Administrator") {
            Lanjut::ke('/');
        }

        $this->view('users/add', [
            'title' => 'Tambah Users',
            'udf' => Config::envReader('UDF'),
            'grup' => Grup::all(),
        ]);
    }

    public function edit($id)
    {
        $user = new Authentication;

        if($user->getNamaGrup() != "Administrator") {
            Lanjut::ke('/');
        }

        $this->view('users/edit', [
            'title' => 'Edit Users',
            'grup' => Grup::all(),
            'id' => $id,
            'nama' => Users::only(select:['nama'], output:'string', id:$id),
            'email' => Users::only(select:['email'], output:'string', id:$id),
            'nohp' => Users::only(select:['nohp'], output:'string', id:$id),
            'grupvalue' => Users::only(select:['grupid'], output:'string', id:$id),
            'gruplabel' => Grup::only(select:['nama'], output: 'string', id:Users::only(select:['grupid'], output:'string', id:$id)),
            'photo' => Users::only(select:['photo'], output:'string', id:$id),
        ]);
    }

    public function read($id)
    {
        /* Halaman detail */
    }

    public function keep()
    {
        $user = new Authentication;

        if($user->getNamaGrup() != "Administrator") {
            Lanjut::ke('/');
        }

        if(!Guard::UserEmailChecker(Input::get('email'))){
            $salt = Generate::salt();
            $pass = Generate::make(Config::envReader('UDF'), $salt);
            $user = DB::terhubung()->input('users', [
                'id' => Generate::ID('users'),
                'username' => Generate::Username('user'),
                'nama' => Input::get('nama'),
                'email' => Input::get('email'),
                'salt' => $salt,
                'psw' => $pass,
                'nohp' => '',
                'photo' => '/assets/img/default.png',
                'grupid' => Input::get('grupid'),
            ]);
            if($user){
                die('Berhasil');
            }else{
                die('Gagal membuat user');
            }
        }else{
            die('Email sudah digunakan');
        }
    }

    public function update()
    {
        $token = Input::get('__token');
        $tmpname = Input::file('photo', 'tmp_name');
        if(Guard::FormChecker($token)){
            if(Guard::UserChangeEmailChecker(Input::get('email'), Input::get('id'))){
                if($tmpname != ""){
                    return $this->updateWithFile();
                }else{
                    return $this->updateNoFile();
                }
            }else{
                die('Email '.Input::get("email").' sudah digunakan');
            }
        }else{
            die('Token Expire');
        }
    }

    protected function updateWithFile() {
        $id = Input::get('id');
        $tipe = pathinfo(Input::file('photo', 'name'), PATHINFO_EXTENSION);
        $tmpName = Input::file('photo', 'tmp_name');
        $namafile = Input::file('photo', 'name');
        $ukuran = Input::file('photo', 'size');
        $namabaru = date('YmdHis')."_".str_replace(" ","_",$namafile);
        $nama = Input::get('nama');
        $email = Input::get('email');
        $nohp = Input::get('nohp');
        $psw = Input::get('psw');
        if(Metafile::approver($tipe, $namafile, $ukuran) == "image") {
            $folderUser = __DIR__.'/../'.Config::envReader('PUBLIC_FOLDER').'/assets/storage/'.$id;

            if(!file_exists($folderUser)){
                mkdir($folderUser, 0777);
            }

            $folder = __DIR__.'/../'.Config::envReader('PUBLIC_FOLDER').'/assets/storage/'.$id.'/pp/';
            if(!file_exists($folder)){
                mkdir($folder, 0777);
            }

            $filebaru = $folder.$namabaru;
            $upload = move_uploaded_file($tmpName, $filebaru);
            if($upload){
                if($psw == ""){
                    $user = DB::terhubung()->perbarui('users', $id, [
                        'nama' => $nama,
                        'email' => $email,
                        'nohp' => $nohp,
                        'photo' => '/assets/storage/'.$id.'/pp/'.$namabaru,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    if($user){
                        die('Berhasil');
                    }else{
                        die('Gagal memperbarui user');
                    }
                }else{
                    $salt = Generate::salt();
                    $user = DB::terhubung()->perbarui('users', $id, [
                        'nama' => $nama,
                        'email' => $email,
                        'nohp' => $nohp,
                        'psw' => Generate::make($psw, $salt),
                        'salt' => $salt,
                        'photo' => '/assets/storage/'.$id.'/pp/'.$namabaru,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    if($user){
                        die('Berhasil');
                    }else{
                        die('Gagal memperbarui user');
                    }
                }
            }else{
                die('Upload photo gagal');
            }
        }else{
            die(Metafile::approver($tipe, $namafile, $ukuran));
        }
    }

    protected function updateNoFile() {
        $id = Input::get('id');
        $nama = Input::get('nama');
        $email = Input::get('email');
        $nohp = Input::get('nohp');
        $psw = Input::get('psw');
        if($psw == ""){
            $user = DB::terhubung()->perbarui('users', $id, [
                'nama' => $nama,
                'email' => $email,
                'nohp' => $nohp,
                'diupdate' => date('Y-m-d H:i:s')
            ]);
            if($user){
                die('Berhasil');
            }else{
                die('Gagal memperbarui user');
            }
        }else{
            $salt = Generate::salt();
            $user = DB::terhubung()->perbarui('users', $id, [
                'nama' => $nama,
                'email' => $email,
                'nohp' => $nohp,
                'psw' => Generate::make($psw, $salt),
                'salt' => $salt,
                'diupdate' => date('Y-m-d H:i:s')
            ]);
            if($user){
                die('Berhasil');
            }else{
                die('Gagal memperbarui user');
            }
        }
    }

    public function delete()
    {
        echo Users::remove();
    }

}