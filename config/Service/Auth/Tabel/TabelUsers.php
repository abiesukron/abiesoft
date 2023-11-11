<?php 

namespace App\Service\Auth\Tabel;

use AbieSoft\Application\Mysql\DB;

class TabelUsers 
{
    public static function index ($search) {
        if($search == "null"){
            return self::load();
        }else{
            return self::search($search);
        }
    }

    protected static function load() {
        echo DB::terhubung()->query("
            SELECT
                users.id,
                users.nama,
                users.email,
                users.photo,
                grup.nama as namagrup
            FROM
                users,
                grup
            WHERE
                users.grupid = grup.id
        ")->json();
    }

    protected static function search($search) {
        echo DB::terhubung()->query("
            SELECT
                users.id,
                users.nama,
                users.email,
                users.photo,
                grup.nama as namagrup
            FROM
                users,
                grup
            WHERE
                users.grupid = grup.id
                AND (
                    users.nama LIKE '%".$search."%'
                    OR users.email LIKE '%".$search."%'
                    OR users.photo LIKE '%".$search."%'
                    OR grup.nama LIKE '%".$search."%'
                )
        ")->json();
    }
}