<?php 

namespace App\Service\Auth\Tabel;

use AbieSoft\Application\Mysql\DB;
use App\Models\Berita as Berita;

class TabelBerita 
{
    public static function index ($search) {
        if($search == "null"){
            return self::load();
        }else{
            return self::search($search);
        }
    }

    protected static function load() {
        echo Berita::all(select:['id','gambar', 'judul', 'potongan', 'editorid', 'publikasi', 'dibuat'], output:'json');
    }

    protected static function search($search) {
        echo DB::terhubung()->query("SELECT id, gambar, judul, potongan, editorid, publikasi, dibuat FROM berita WHERE (judul LIKE '%".$search."%' or potongan LIKE '%".$search."%') ")->json();
    }
}