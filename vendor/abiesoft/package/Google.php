<?php

namespace AbieSoft\Application\Package;

use AbieSoft\Application\Http\Lanjut;
use AbieSoft\Application\Utilities\Config;
use AbieSoft\Application\Utilities\Input;
use Google_Client;
use Google_Service_Resource;

class Google
{

    public static function getAuthentication () {
        $client = new Google_Client();
        $client->setApplicationName("Login ".Config::envReader('WEB_TITLE')." dengan Google");
        $client->setClientId(Config::envReader('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(Config::envReader('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(Config::envReader('GOOGLE_REDIRECT_URI'));
        $client->addScope('email');
        $client->addScope('profile');
        $code = Input::get('code');
        if($code){
            $aksesToken = $client->fetchAccessTokenWithAuthCode($code)['access_token'];
            $client->setAccessToken($aksesToken);
            return self::getUserInfo($aksesToken);
        }
    }

    protected static function getUserInfo ($result) {
        if($result){
            return $result;
        }

        Lanjut::ke('/');
    }

    public static function createAuthUrl () {
        $client = new Google_Client();
        $client->setApplicationName("Login ".Config::envReader('WEB_TITLE')." dengan Google");
        $client->setClientId(Config::envReader('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(Config::envReader('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(Config::envReader('GOOGLE_REDIRECT_URI'));
        $client->addScope('email');
        $client->addScope('profile');
        return $client->createAuthUrl();
    }


}