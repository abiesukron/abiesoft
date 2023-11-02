<?php 

namespace AbieSoft\Application\Http;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Generate;
use AbieSoft\Application\Utilities\Reader;
use AbieSoft\Application\Utilities\Tanggal;
use Latte\Engine;

class Controller
{
    public string   $url = "",
                    $apikey = "",
                    $keyword = "",
                    $appname = "",
                    $appversi = "",
                    $appdes = "",
                    $title = "",
                    $uid = "",
                    $nama = "",
                    $photo = "",
                    $email = "",
                    $nohp = "",
                    $username = "",
                    $grupid = "",
                    $namagrup = "",
                    $salt = "",
                    $psw = "",
                    $csrf = "",
                    $hariini = "",
                    $current = "",
                    $sessionkey = "";

    public function view(string $page, array $data = [])
    {
        $finaldata = [];
        $d = new Controller;
        $d->url = Config::baseUrl();
        $d->apikey = Config::envReader('APIKEY');
        $d->title = Config::envReader('WEB_TITLE');
        $d->keyword = "";
        $d->appname = Config::envReader('WEB_TITLE');
        $d->appversi = Config::envReader('VERSION');
        $d->appdes = Config::envReader('WEB_DES');
        $d->csrf = Generate::csrf();
        foreach ($data as $k => $v) {
            $d->$k = $v;
        }

        $d->uid = "";
        $d->nama = "";
        $d->photo = "";
        $d->email = "";
        $d->username = "";
        $d->grupid = "";
        $d->namagrup = "";
        $d->salt = "";
        $d->psw = "";
        $d->hariini = Tanggal::hariini();
        $d->current = Reader::currentPage();
        $d->sessionkey = Config::envReader('SESSIONKEY');
        $auth = new Authentication;

        if($auth->isLogin()){
            $d->uid = $auth->getID();
            $d->nama = $auth->getNama();
            $d->photo = $auth->getPhoto();
            $d->email = $auth->getEmail();
            $d->nohp = $auth->getNoHp();
            $d->username = $auth->getUsername();
            $d->grupid = $auth->getGrupID();
            $d->namagrup = $auth->getNamaGrup();
            $d->salt = $auth->getSalt();
            $d->psw = $auth->getPassword();
        }

        $finaldata = $d;
        $dir = __DIR__ . "/../../../";
        $latte = new Engine();
        $latte->setTempDirectory($dir . "temp");

        if(is_numeric($page)){
            Lanjut::ke('/');
            // $latte->render($dir . "templates/theme/error/" . $page . ".latte", $finaldata);
            // die();
        }else{

            if($page == "login" || $page == "registrasi" || $page == "ingat" || $page == "konfirmasi" || $page == "profile" || $page == "seting"){
                $latte->render($dir . "templates/theme/auth/" . $page . ".latte", $finaldata);
                die();
            }else{
                if(file_exists($dir . "templates/page/" . $page . ".latte")){
                    $latte->render($dir . "templates/page/" . $page . ".latte", $finaldata);
                    die();
                }else{
                    $latte->render($dir . "templates/theme/error/404.latte", $finaldata);
                    die();
                }
            }

        }

    }
}