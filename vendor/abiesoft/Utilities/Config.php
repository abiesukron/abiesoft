<?php 

namespace AbieSoft\Application\Utilities;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Http\Lanjut;
use Nette\Security\User;
use Symfony\Component\Yaml\Yaml;

class Config 
{

    public static function baseUrl() : string
    {
        $http = '';
        (Config::envReader('WEB_SSL') == true) ? $http = 'https://' : $http = 'http://';
        return $http . Config::envReader('WEB_DOMAIN');
    }

    public static function envReader(string $label) : string
    {
        $result = parse_ini_file(__DIR__ . "/../../../.env")[$label];
        return match ($result) {
            'sesi' => self::labelSesi(),
            default => $result
        };
    }

    protected static function labelSesi () : string {
        $user = new Authentication;

        if($user->isLogin()){
            return sha1($user->getSessionId()."".$user->getID());
        }

        return '';
    }

    public static function envChanger(string $label, string $value) 
    {
        $file = file_get_contents(__DIR__ . "/../../../.env");
        $file = str_replace($label."=".self::envReader($label),$label."=".$value,$file);
        file_put_contents(__DIR__ . "/../../../.env", $file);
    }

    public static function yamlReader() : array
    {
        return Yaml::parseFile(__DIR__ . "/../../../config/Router.yaml");
    }

}