<?php 

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;
use AbieSoft\Application\Utilities\Generate;

class api extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('apikey');
        $schema->teks('jenis'); // Jenis masterkey (tanpa batas waktu dan request), trial (batas 1 bulan dan 1 hari 1000 request)  
        $schema->number('request');
        $schema->tanggal('expire');
        $sql = $schema->create('api');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('api', [
            'id' => 'xoKjxctwPYrm',
            'apikey' => 'Ym7ZEzVtuL6i',
            'jenis' => 'masterkey',
            'request' => '0',
            'expire' => '2023-12-31 00:00:00',
            'dibuat' => '2023-03-02 03:35:38',
        ]);
    }
}
$create = new api();
$create->buattabel();