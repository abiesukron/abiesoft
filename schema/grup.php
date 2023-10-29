<?php

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;
use AbieSoft\Application\Utilities\Generate;

class grup extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama: 'nama', panjang: 100);
        $schema->teks(nama: 'role', panjang: 50);
        $sql = $schema->create('grup');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('grup', [
            'id' => 'dpYCGB9FFeht',
            'nama' => 'Administrator',
            'role' => 'admin',
        ]);

        DB::terhubung()->input('grup', [
            'id' => 'aoAnr8YH1ia0',
            'nama' => 'Standar User',
            'role' => 'user',
        ]);
    }
}
$create = new grup();
$create->buattabel();
