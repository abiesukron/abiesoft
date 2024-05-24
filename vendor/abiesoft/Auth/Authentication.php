<?php 

namespace AbieSoft\Application\Auth;

use AbieSoft\Application\Http\Controller;
use AbieSoft\Application\Http\Lanjut;
use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Package\Email;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Cookies;
use AbieSoft\Application\Utilities\Generate;
use AbieSoft\Application\Utilities\Guard;
use AbieSoft\Application\Utilities\Input;
use AbieSoft\Application\Utilities\Metafile;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Authentication 
{

    protected $isLogin = false;

    protected function cariuser(string $email)
    {
        if ($email) {
            $data = DB::terhubung()->tampilkan('users', ['email', '=', $email]);
            if ($data->hitung()) {
                return $data->awal();
            }
        }
        return false;
    }

    public function login () {
        $controller = new Controller;
        $jwt = Cookies::lihat('ABIESOFT-SID');
        $registrasi = DB::terhubung()->toString('seting', 'tampilkan', '2JDeBas7ssP5');
        $google = "";
        if($jwt != ""){
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $user = $this->cariuser($email);
            return $controller->view('ingat', [
                'emailuser' => $email,
                'photouser' => $user->photo,
                'namauser' => $user->nama,
                'registrasi' => $registrasi,
                'csrf' => Generate::csrf()
            ]);
        }else{
            return $controller->view('login', [
                'registrasi' => $registrasi,
                'google' => $google,
                'google_url_login' => "",
                'csrf' => Generate::csrf()
            ]);
        }
    }

    public function setLogin () {
        if(Guard::FormChecker(Input::get('__token'))) {
            $email = Input::get('email');
            $user = $this->cariuser($email);
            if($user){
                if($user->psw == Generate::make(Input::get('psw'), $user->salt)){
                    $dir = __DIR__ . "/../../../" . Config::envReader('PUBLIC_FOLDER') . "/assets/storage/" . $user->id;
                    if (!file_exists($dir)) {
                        mkdir($dir, 0777, false);
                    }
                    $sessionid = substr(sha1(rand(1000, 9999) . date('YmdHis')), 5, 9);
                    DB::terhubung()->perbarui('users', $user->id, [
                        'sessionid' => $sessionid,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    $ingat = Input::get('ingat');
                    $payload = [
                        'email' => $email,
                        'sessionid' => $sessionid,
                        'ingat' => $ingat
                    ];
                    $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                    Cookies::simpan('ABIESOFT-SID', $jwt);
                    $seting = [
                        'arsip' => date('Y'),
                        'registrasi' => 1,
                    ];
                    $jwtseting = JWT::encode($seting, Config::envReader('WEB_TOKEN'), 'HS256');
                    Cookies::simpan('ABIESOFT-SETING', $jwtseting);
                    die('Berhasil');
                }else{
                    // Salah Password
                    $user = $this->cariuser($email);

                    if($user){
                        $payload = [
                            'email' => $email
                        ];
                        $jwt = JWT::encode($payload, Config::envReader('WEB_TOKEN'), 'HS256');
                        Cookies::simpan('ABIESOFT-RESET', $jwt);
                        die($jwt);
                    }else{
                        die('Login gagal');        
                    }

                }
            }else{
                // User tidak ditemukan
                die('Login gagal');    
            }
        }else{
            // Token expire
            die('Token Expire');
        }
    }

    public function registrasi () {
        $registrasi = DB::terhubung()->toString('seting', 'tampilkan', '2JDeBas7ssP5');
        $google = "";
        if($registrasi == 0){
            Lanjut::ke('/login');
        }
        $controller = new Controller;
        return $controller->view('registrasi', [
            'google' => $google,
            'google_url_login' => "",
            'csrf' => Generate::csrf()
        ]);
    }

    public function setRegistrasi () {
        $email = Input::get('email');
        $token = Input::get('__token');
        $psw = Input::get('psw');

        $registrasi = DB::terhubung()->toString('seting', 'tampilkan', '2JDeBas7ssP5');
        if($registrasi == 0){
            Lanjut::ke('/login');
        }

        if(Guard::FormChecker($token)){
            $cek = DB::terhubung()->cekdata('users', ['email' => Input::get('email')]);
            if(!$cek){
                $salt = Generate::salt();
                $password = Generate::make($psw, $salt);
                $input = DB::terhubung()->input('users', [
                    'id' => Generate::ID('users'),
                    'nama' => Input::get('nama'),
                    'username' => Generate::Username('user'),
                    'email' => Input::get('email'),
                    'nohp' => '',
                    'salt' => $salt,
                    'psw' => $password
                ]);
                if($input){
                    die('Berhasil');
                }else{
                    die('Registrasi Gagal');
                }
            }else{
                die('Email <strong>'.$email.'</strong> sudah digunakan');
            }
        }else{
            die('Token Expire');
        }

    }

    public function konfirmasi () {
        $jwt = Cookies::lihat('ABIESOFT-RESET');
        $controller = new Controller;
        if($jwt != "" AND $jwt == Input::get('rid')){
            $google = "";
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            Cookies::hapus('ABIESOFT-RESET');

            $kode = Generate::kode(6);
            $user = $this->cariuser($email);

            if($user){
                $update = DB::terhubung()->perbarui('users', $user->id, ['kodereset' => $kode]);
                if($update){
                    if(Email::verifikasi($user->email, 'Kode Reset', $kode)){
                        return $controller->view('konfirmasi', [
                            'emailuser' => $user->email,
                            'google' => $google,
                            'csrf' => Generate::csrf()
                        ]);
                    }else{
                        Lanjut::ke('/');
                    }
                }else{
                    Lanjut::ke('/');
                }
            }else{
                Lanjut::ke('/');
            }
 
        }else{
            Lanjut::ke('/');
        }
    }

    public function setKonfirmasi () {
        $token = Input::get('__token');
        $email = Input::get('email');
        $kodereset = Input::get('kodereset');
        $user = $this->cariuser($email);
        $psw = Input::get('psw');
        $salt = Generate::salt();
        $password = Generate::make($psw, $salt);

        if(Guard::FormChecker($token)){
            if($kodereset == $user->kodereset){
                $simpan = DB::terhubung()->perbarui('users', $user->id, [
                    'salt' => $salt,
                    'psw' => $password
                ]);
                if($simpan){
                    die('Berhasil');
                }else{
                    die('Gagal memperbarui password');
                }
            }else{
                die('Gagal memperbarui password');
            }
        }else{
            die('Token Expire');
        }
    }

    public function isLogin()
    {
        $this->isLogin = false;
        if (Cookies::ada('ABIESOFT-SID')) {
            $jwt = Cookies::lihat('ABIESOFT-SID');
            try {
                $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                $sessionid = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->sessionid;
                $ingat = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->ingat;
                $user = $this->cariuser($email);
                if ($user) {
                    if ($user->sessionid == $sessionid) {
                        $this->isLogin = true;
                    } else {
                        if($ingat == "on"){
                            $this->isLogin = false;
                        }else{
                            Cookies::hapus('ABIESOFT-SID');
                            $this->isLogin = false;
                        }
                    }
                } else {
                    Cookies::hapus('ABIESOFT-SID');
                    $this->isLogin = false;
                }
            } catch (Exception $e) {
                Cookies::hapus('ABIESOFT-SID');
                $this->isLogin = false;
            }
        }
        return $this->isLogin;
    }

    public function logout()
    {
        session_destroy();
        if(Cookies::ada('ABIESOFT-SID')){
            $jwt = Cookies::lihat('ABIESOFT-SID');
            $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
            $ingat = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->ingat;
            if($ingat == "on"){
                $payloadingat = [
                    'email' => $email,
                    'sessionid' => '',
                    'ingat' => $ingat
                ];
                $jwtingat = JWT::encode($payloadingat, Config::envReader('WEB_TOKEN'), 'HS256');
                Cookies::simpan('ABIESOFT-SID', $jwtingat);
                $this->isLogin = false;
                Lanjut::ke('/');
            }else{
                Cookies::hapus('ABIESOFT-SID');
                $this->isLogin = false;
                Lanjut::ke('/');
            }
        }else{
            Lanjut::ke('/');
        }
    }

    public function reset()
    {
        Cookies::hapus('ABIESOFT-SID');
        Lanjut::ke('/');
    }

    protected function userData($data)
    {
        if (Cookies::ada('ABIESOFT-SID')) {
            $jwt = Cookies::lihat('ABIESOFT-SID');
            try {
                $email = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->email;
                $sessionid = JWT::decode($jwt, new Key(Config::envReader('WEB_TOKEN'), 'HS256'))->sessionid;
                $user = $this->cariuser($email);
                if ($user) {
                    if ($user->sessionid == $sessionid) {
                        return $user->$data;
                    } else {
                        Cookies::hapus('ABIESOFT-SID');
                        $this->isLogin = false;
                    }
                } else {
                    Cookies::hapus('ABIESOFT-SID');
                    $this->isLogin = false;
                }
            } catch (Exception $e) {
                Cookies::hapus('ABIESOFT-SID');
                $this->isLogin = false;
            }
        }
    }

    public function getID()
    {
        return $this->userData('id');
    }

    public function getNama()
    {
        return $this->userData('nama');
    }

    public function getEmail()
    {
        return $this->userData('email');
    }

    public function getNoHp()
    {
        return $this->userData('nohp');
    }

    public function getUsername()
    {
        return $this->userData('username');
    }

    public function getPhoto()
    {
        $file = __DIR__."/../../../".Config::envReader('PUBLIC_FOLDER').$this->userData('photo');
        if(file_exists($file)){
            return $this->userData('photo');
        }else{
            return '/assets/img/default.png';
        }
    }

    public function getGrupID()
    {
        return $this->userData('grupid');
    }

    public function getNamaGrup()
    {
        return DB::terhubung()->toString('grup', 'nama', $this->userData('grupid'));
    }

    public function getSalt()
    {
        return $this->userData('salt');
    }

    public function getPassword()
    {
        return $this->userData('psw');
    }

    public function getSessionId()
    {
        return $this->userData('sessionid');
    }




    /*
        Profile
    */

    public function profile ($id) {
        if(!$this->isLogin()){
            Lanjut::ke('/');
        }
        $controller = new Controller;
        if($id == "@".$this->userData('username')){
            return $controller->view('profile', [
                'title' => 'Profile',
                'id' => $this->userData('id')
            ]);   
        }
        Lanjut::ke("/");
    }

    public function setProfile () {
        if(!$this->isLogin()){
            Lanjut::ke('/');
        }
        
        $token = Input::get('__token');

        if(Guard::FormChecker($token)){
            return $this->emailCheck();
        }else{
            die('Token Expire');
        }
    }

    protected function emailCheck() {
        $email = Input::get('email');
        $namafile = Input::file('photo', 'name');
        $authemail = $this->userData('email');
        $authid = $this->userData('id');

        if($email != $authemail){
            $cekemail = DB::terhubung()->query("SELECT email, id FROM users WHERE email = '{$email}' AND id != '{$authid}' ")->hitung();
            if(!$cekemail){
                if($namafile) {
                    return $this->adafile($authid);
                }else{
                    return $this->tanpafile($authid);
                }
            }else{
                die('Email <b>'.$email.'</b> Sudah Ada');
            }
        }else {
            if($namafile) {
                return $this->adafile($authid);
            }else{
                return $this->tanpafile($authid);
            }
        }
    }

    protected function adafile($authid) {
        $tipe = pathinfo(Input::file('photo', 'name'), PATHINFO_EXTENSION);
        $tmpName = Input::file('photo', 'tmp_name');
        $namafile = Input::file('photo', 'name');
        $ukuran = Input::file('photo', 'size');
        $namabaru = date('YmdHis')."_".str_replace(" ","_",$namafile);
        $nama = Input::get('nama');
        $email = Input::get('email');
        $nohp = Input::get('nohp');
        $psw = Input::get('psw');
        $dataurl = Input::get('__url');
        if(Metafile::approver($tipe, $namafile, $ukuran) == "image") {
            $folder = __DIR__.'/../../../'.Config::envReader('PUBLIC_FOLDER').'/assets/storage/'.$authid.'/pp/';
            if(!file_exists($folder)){
                mkdir($folder, 0777);
            }
            $filebaru = $folder.$namabaru;
            $upload = move_uploaded_file($tmpName, $filebaru);
            if($upload){
                if($psw == ""){
                    $user = DB::terhubung()->perbarui('users', $authid, [
                        'nama' => $nama,
                        'email' => $email,
                        'nohp' => $nohp,
                        'photo' => '/assets/storage/'.$authid.'/pp/'.$namabaru,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    if($user){
                        die('Photo|'.$dataurl.'/assets/storage/'.$authid.'/pp/'.$namabaru);
                    }else{
                        die('Gagal memperbarui user');
                    }
                }else{
                    $salt = Generate::salt();
                    $user = DB::terhubung()->perbarui('users', $authid, [
                        'nama' => $nama,
                        'email' => $email,
                        'nohp' => $nohp,
                        'psw' => Generate::make($psw, $salt),
                        'salt' => $salt,
                        'photo' => '/assets/storage/'.$authid.'/pp/'.$namabaru,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    if($user){
                        die('Photo|'.$dataurl.'/assets/storage/'.$authid.'/pp/'.$namabaru);
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

    protected function tanpafile($authid) {
        $nama = Input::get('nama');
        $email = Input::get('email');
        $nohp = Input::get('nohp');
        $psw = Input::get('psw');
        if($psw == ""){
            $user = DB::terhubung()->perbarui('users', $authid, [
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
            $user = DB::terhubung()->perbarui('users', $authid, [
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

    public function dropProfile () {
        if(!$this->isLogin()){
            Lanjut::ke('/');
        }

        $id = Input::get('id');
        $token = Input::get('__token');
        $auth = new Authentication;

        if(Guard::FormChecker($token)){
            if($auth->getID() == $id){
                $hapus = DB::terhubung()->hapus('users', ['id','=',$id]);
                if($hapus){
                    die('Berhasil');
                }else{
                    die('Gagal menghapus data');
                }
            }else{
                die('Anda tidak diijinkan menghapus data');
            }
        }else{
            die('Token Expire');
        }
    }

    public function photoProfile () {
        $token = Input::get('__token');
        if(Guard::FormChecker($token)){
            $tipe = pathinfo(Input::file('photo', 'name'), PATHINFO_EXTENSION);
            $tmpName = Input::file('photo', 'tmp_name');
            $namafile = Input::file('photo', 'name');
            $ukuran = Input::file('photo', 'size');
            $namabaru = date('YmdHis')."_".str_replace(" ","_",$namafile);
            if(Metafile::approver($tipe, $namafile, $ukuran) == "image") {
                $folder = __DIR__.'/../../../'.Config::envReader('PUBLIC_FOLDER').'/assets/storage/'.$this->getID().'/pp/';
                if(!file_exists($folder)){
                    mkdir($folder, 0777);
                }
                $filebaru = $folder.$namabaru;
                $upload = move_uploaded_file($tmpName, $filebaru);
                if($upload){
                    $user = DB::terhubung()->perbarui('users', $this->getID(), [
                        'photo' => '/assets/storage/'.$this->getID().'/pp/'.$namabaru,
                        'diupdate' => date('Y-m-d H:i:s')
                    ]);
                    if($user){
                        die('photo|/assets/storage/'.$this->getID().'/pp/'.$namabaru);
                    }else{
                        die('Gagal memperbarui user');
                    }
                }else{
                    die('Upload photo gagal');
                }
            }else{
                die(Metafile::approver($tipe, $namafile, $ukuran));
            }
        }else{
            die('Token Expire');
        }
    }

    public function hapusPhotoProfile () {
        $token = Input::get('__token');
        $photo = Input::get('__photo');
        if(Guard::FormChecker($token)){
            $file = __DIR__.'/../../../'.Config::envReader('PUBLIC_FOLDER').$photo;
            if(file_exists($file)){
                $default = '/assets/img/default.png';
                $perbarui = DB::terhubung()->perbarui('users', $this->getID(), ['photo' => $default]);
                if($perbarui){
                    if($photo != $default){
                        unlink($file);
                    }
                    echo "Berhasil|".$default;
                }else{
                    die('Gagal menghapus photo');    
                }
            }else{
                die('Gagal menghapus photo');    
            }
        }else{
            die('Token Expire');
        }
    }



    /*
        Seting
    */

    public function seting () {
        if(!$this->isLogin()){
            Lanjut::ke('/');
        }
        $controller = new Controller;
        $seting = DB::terhubung()->query("SELECT * FROM seting")->hasil();
        $controller->view('seting', [
            'title' => 'Seting',
            'seting' => $seting,
            'smtp' => Config::envReader('EMAIL_SMTP'),
            'akun' => Config::envReader('EMAIL_AKUN'),
            'password' => Config::envReader('EMAIL_PASSWORD'),
            'port' => Config::envReader('EMAIL_PORT'),
            'tampilanemail' => Config::envReader('EMAIL_PENGIRIM'),
            'pengirim' => Config::envReader('EMAIL_NAMA_PENGIRIM'),
            'tipeimage' => Config::envReader('FILE_TYPE_IMAGE'),
            'tipemedia' => Config::envReader('FILE_TYPE_MEDIA'),
            'tipedokumen' => Config::envReader('FILE_TYPE_DOKUMEN'),
            'ukuranimage' => Config::envReader('FILE_SIZE_IMAGE'),
            'ukuranmedia' => Config::envReader('FILE_SIZE_MEDIA'),
            'ukurandokumen' => Config::envReader('FILE_SIZE_DOKUMEN'),
            'apikey' => Config::envReader('APIKEY')
        ]);
    }


    public function setSeting () {
        $token = Input::get('__token');
        $model = Input::get('__model');
        if(Guard::FormChecker($token)){
            if($this->getGrupID() == "dpYCGB9FFeht"){
                return match ($model) {
                    'file' => $this->setSetingFile(),
                    'email' => $this->setSetingEmail(),
                     default => $this->setError(),
                };
            }else{
                die('Anda tidak diijinkan');   
            }
        }else{
            die('Token Expire');
        }
    }

    protected function setSetingFile () {
        Config::envChanger('FILE_TYPE_IMAGE',Input::get('tipeimage'));
        Config::envChanger('FILE_TYPE_MEDIA',Input::get('tipemedia'));
        Config::envChanger('FILE_TYPE_DOKUMEN',Input::get('tipedokumen'));
        Config::envChanger('FILE_SIZE_IMAGE',Input::get('ukuranimage'));
        Config::envChanger('FILE_SIZE_MEDIA',Input::get('ukuranmedia'));
        Config::envChanger('FILE_SIZE_DOKUMEN',Input::get('ukurandokumen'));
        die("Berhasil");
    }

    protected function setSetingEmail () {
        Config::envChanger('EMAIL_SMTP',Input::get('smtp'));
        Config::envChanger('EMAIL_AKUN',Input::get('akun'));
        Config::envChanger('EMAIL_PASSWORD',Input::get('password'));
        Config::envChanger('EMAIL_PORT',Input::get('port'));
        Config::envChanger('EMAIL_PENGIRIM',Input::get('tampilanemail'));
        Config::envChanger('EMAIL_NAMA_PENGIRIM',Input::get('pengirim'));
        die("Berhasil");
    }

    protected function setError () {
        die('Gagal menyimpan perubahan');
    }




    /*






        Google Authentication
    **/

    

}