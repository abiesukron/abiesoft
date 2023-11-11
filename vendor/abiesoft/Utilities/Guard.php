<?php

namespace AbieSoft\Application\Utilities;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Reader;

class Guard
{

    public static function FormChecker(string $token): bool
    {
        $cektoken = DB::terhubung()->query("SELECT token, ip FROM token WHERE ip = '" . Reader::ip() . "' ");

        if ($cektoken->hitung()) {
            foreach ($cektoken->hasil() as $t) {
                if ($t->token === $token) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }

    public static function UserEmailChecker(string $email): bool
    {
        $cekemail = DB::terhubung()->query("SELECT email FROM users WHERE email = '".$email."' ");
        if($cekemail->hitung()){
            return true;
        }

        return false;
    }

    public static function UserChangeEmailChecker(string $email, string $id): bool
    {
        $cekemail = DB::terhubung()->query("SELECT id, email FROM users WHERE email = '".$email."' ");
        if($cekemail->hitung()){
            foreach($cekemail->hasil() as $ce){
                if($ce->id == $id){
                    return true;
                } else {
                    return false;
                }
            }
        }else{
            return true;
        }
    }
}
