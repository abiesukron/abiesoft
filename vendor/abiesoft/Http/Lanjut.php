<?php 

namespace AbieSoft\Application\Http;

use AbieSoft\Application\Utilities\Config;

class Lanjut
{

    public static function ke($location = null)
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include_once __DIR__ . '/../../../templates/theme/error/404.latte';
                        exit();
                    case 403:
                        header('HTTP/1.0 403 Forbidden');
                        include_once __DIR__ . '/../../../templates/theme/error/403.latte';
                        exit();
                }
            }
            header('location:' . Config::baseUrl() . $location);
            exit();
        }
    }
}