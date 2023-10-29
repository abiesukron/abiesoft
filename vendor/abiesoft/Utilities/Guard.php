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
}
