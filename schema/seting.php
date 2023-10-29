<?php 

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;
use AbieSoft\Application\Utilities\Generate;

class seting extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('nama');
        $schema->teks('keterangan');
        $schema->teks('icon');
        $schema->teks('tampilkan');
        $sql = $schema->create('seting');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('seting', [
            'id' => '2JDeBas7ssP5',
            'nama' => 'Registrasi',
            'keterangan' => 'Tampilkan registrasi di halaman login',
            'icon' => 'las la-user-plus',
            'tampilkan' => '0'
        ]);

        DB::terhubung()->input('seting', [
            'id' => '3AvoHp30AhkE',
            'nama' => 'Login Google',
            'keterangan' => 'Tampilkan login dengan google di halaman login',
            'icon' => 'lab la-google',
            'tampilkan' => '0'
        ]);
    }
}
$create = new seting();
$create->buattabel();
