<?php

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;
use AbieSoft\Application\Utilities\Generate;

class users extends Schema
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks(nama: 'nama');
        $schema->teks(nama: 'username', unique: true);
        $schema->teks(nama: 'email', unique: true);
        $schema->teks(nama: 'nohp');
        $schema->teks(nama: 'psw');
        $schema->teks(nama: 'salt');
        $schema->teks(nama: 'photo', default: '/assets/img/default.png');
        $schema->teks(nama: 'grupid', panjang: 12, default: 'aoAnr8YH1ia0');
        $schema->teks(nama: 'sessionid');
        $schema->teks(nama: 'kodereset');
        $sql = $schema->create('users');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        /*
            Password Default 12345
        */

        DB::terhubung()->input('users', [
            // 'id' => Generate::ID('users'),
            'id' => 'HfCnTEIFtAnB',
            'nama' => 'Administrator',
            'username' => Generate::Username('user'),
            'email' => 'sabbayroad@gmail.com',
            'nohp' => '0000',
            'psw' => 'f8e538f55c6d29729d542b21c765fa9b3b56f16350f0e1dc91ae648ffafb24fb',
            'salt' => 'uYif',
            'grupid' => 'dpYCGB9FFeht'
        ]);
    }
}
$create = new users();
$create->buattabel();
