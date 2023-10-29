<?php

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;
use AbieSoft\Application\Utilities\Generate;

class token extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('ip');
        $schema->teks('token');
        $sql = $schema->create('token');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            DB::terhubung()->input('token', [
                'id' => Generate::ID('token'),
                'nama' => '',
            ]);
        */
    }
}
$create = new token();
$create->buattabel();
