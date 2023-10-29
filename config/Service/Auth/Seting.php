<?php 

namespace App\Service\Auth;

use AbieSoft\Application\Mysql\DB;

class Seting 
{
    public function toggle($id) {
        $tampil = DB::terhubung()->toString('seting', 'tampilkan', $id);
        if($tampil == 1){
            DB::terhubung()->perbarui('seting', $id, [
                'tampilkan' => 0
            ]);
            echo 0;
        }else{
            DB::terhubung()->perbarui('seting', $id, [
                'tampilkan' => 1
            ]);
            echo 1;
        }
    }
}