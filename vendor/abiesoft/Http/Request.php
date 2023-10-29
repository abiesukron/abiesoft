<?php 

namespace AbieSoft\Application\Http;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Input;

class Request
{

    public static function Method(): string
    {
        $result = strtolower($_SERVER['REQUEST_METHOD']);
        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            if (Input::get('__method')) {
                $result = strtolower(Input::get('__method'));
            } else {
                $result = "post";
            }
        }
        return $result;
    }

    public static function Path(): string
    {
        
        $uri = $_SERVER['REQUEST_URI'];

        str_ends_with($uri, "/") ? $uri = substr($uri, 0, -1) : $uri = $uri;

        $path = explode("/", $uri);

        if (count($path) > 2) {
            $e1 = explode("/", $uri)[1];    
            if($e1 == Config::envReader('SESSIONKEY')){
                $tb= explode("/", $uri)[2];
                $id = "";
                if(isset(explode("/", $uri)[3])){
                    $id= explode("/", $uri)[3];
                    $original = "/".Config::envReader('SESSIONKEY')."/" . $tb . "/" . $id;
                    if ($id != "add") {
                        $replace = Config::envReader('SESSIONKEY')."/".$tb . "/{id}";
                    } else {
                        $replace = Config::envReader('SESSIONKEY')."/".$tb. "/add";
                    }
                    $path = str_replace($original, $replace, $uri);
                }else{
                    $original = Config::envReader('SESSIONKEY')."/" . $tb . "/" . $id;
                    $path = substr($original, 0, -1);
                }
            }else{
                $tb= explode("/", $uri)[1];
                $id= explode("/", $uri)[2];
                $original = "/" . $tb . "/" . $id;
                if ($id != "add") {
                    $replace = $tb . "/{id}";
                } else {
                    $replace = $tb . "/add";
                }
                $path = str_replace($original, $replace, $uri);
            }
        } else {
            isset($path[1]) ? $path = $path[1] : $path = "/";
        }
        
        ($path == "/") ? $path = $path : $path = "/" . $path;

        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_REQUEST)) {
            $req = "";
            foreach ($_REQUEST as $a => $b) {
                $req .= "{" . $a . "}";
            }
            $path = explode("?", $path)[0] . $req;
        } else {
            $path = $path;
        }

        return $path;
    }

    public static function ID(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $e1 = explode("/", $uri)[1];  
        $id = ""; 
        if($e1 == Config::envReader('SESSIONKEY')){
            (isset(explode("/", $uri)[3])) ?  $id = explode("/", $uri)[3] : $id;
        }else{
            (isset(explode("/", $uri)[2])) ? $id = explode("/", $uri)[2] : $id = "";
        }

        return $id;
    }

    public static function Session()
    {
        $status = "public";
        $array = [];
        $urlPath = self::Path();
        foreach (Config::yamlReader() as $key => $value) {
            if (is_array($value)) {
                if(isset($value['admin'])){
                    array_push($array, ['/'.Config::envReader('SESSIONKEY').'/' . $key, true]);
                    array_push($array, ['/'.Config::envReader('SESSIONKEY').'/' . $key . '/add', true]);
                    array_push($array, ['/'.Config::envReader('SESSIONKEY').'/' . $key . '/{id}/edit', true]);
                    array_push($array, ['/'.Config::envReader('SESSIONKEY').'/' . $key . '/{id}', true]);
                }else{
                    array_push($array, [$value['path'], $value['auth']]);
                }
            } else {
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/' . Config::envReader('APIKEY') . '{mdl}{fc}{id}', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/profile/{id}', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/profile', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/ganti-photo', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/hapus-photo', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/seting', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/seting', true]);
                array_push($array, ['/'.Config::envReader('SESSIONKEY').'/dashboard', true]);

                // Apikey Service
                array_push($array, ['/service{apikey}{tb}{fc}', false]); 
            }
        }
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i][0] == $urlPath) {
                if ($array[$i][1] == true) {
                    $status = "secure";
                }
            }
        }

        return $status;
    }

}