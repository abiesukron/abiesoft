<?php 

namespace App\Service\Auth\Tabel;

use AbieSoft\Application\Mysql\DB;
use App\Models\Grup;

class TabelGrup 
{
    public static function index ($search) {
        if($search == "null"){
            return self::load();
        }else{
            return self::search($search);
        }
    }

    protected static function load() {
        echo Grup::all(select:['id','nama', 'keterangan', 'role'], output:'json');
    }

    protected static function search($search) {
        echo DB::terhubung()->query("SELECT id, nama, keterangan, role FROM grup WHERE (nama LIKE '%".$search."%' or keterangan LIKE '%".$search."%' or role LIKE '%".$search."%') ")->json();
    }
}