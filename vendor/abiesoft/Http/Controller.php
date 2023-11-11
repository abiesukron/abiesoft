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
                    $nama_ = "",
                    $photo_ = "",
                    $email_ = "",
                    $nohp_ = "",
                    $username_ = "",
                    $grupid_ = "",
                    $namagrup_ = "",
                    $salt_ = "",
                    $psw_ = "",
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
        $d->nama_ = "";
        $d->photo_ = "";
        $d->email_ = "";
        $d->username_ = "";
        $d->grupid_ = "";
        $d->namagrup_ = "";
        $d->salt_ = "";
        $d->psw_ = "";
        $d->hariini = Tanggal::hariini();
        $d->current = Reader::currentPage();
        $d->sessionkey = Config::envReader('SESSIONKEY');
        $auth = new Authentication;

        if($auth->isLogin()){
            $d->uid = $auth->getID();
            $d->nama_ = $auth->getNama();
            $d->photo_ = $auth->getPhoto();
            $d->email_ = $auth->getEmail();
            $d->nohp_ = $auth->getNoHp();
            $d->username_ = $auth->getUsername();
            $d->grupid_ = $auth->getGrupID();
            $d->namagrup_ = $auth->getNamaGrup();
            $d->salt_ = $auth->getSalt();
            $d->psw_ = $auth->getPassword();
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