<?php

namespace AbieSoft\Application\Collection;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Utilities\Guard;
use AbieSoft\Application\Utilities\Input;

trait Remove
{

    public static function doRemove(string $tabel = "")
    {
        $token = Input::get('__token');
        if (Guard::FormChecker($token)) {
            $hapus = DB::terhubung()->hapus($tabel, ['id', '=', Input::get('id')]);
            if ($hapus) {
                return "Berhasil";
            } else {
                return "Gagal menghapus data";
            }
        } else {
            return "Token Expire";
        }
    }
}
