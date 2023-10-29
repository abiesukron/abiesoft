<?php 

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;

class kategori extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('nama');
        $schema->paragrap('keterangan');
        $sql = $schema->create('kategori');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        DB::terhubung()->input('kategori', [
            'id' => 'aPmxl2iA0unD',
            'nama' => 'Kriminal',
            'keterangan' => 'Berisi berita seputar kasus-kasus yang lagi marak dan uptodate'
        ]);

        DB::terhubung()->input('kategori', [
            'id' => 'aQH0p8iAAkFb',
            'nama' => 'Edukasi',
            'keterangan' => 'Berisi informasi atau sesuatu yang mengedukasi'
        ]);

        DB::terhubung()->input('kategori', [
            'id' => 'ar1gAk4rSmxA',
            'nama' => 'Institusi',
            'keterangan' => 'Berisi berita seputar pemerintahan'
        ]);

        DB::terhubung()->input('kategori', [
            'id' => 'as012i5sYezL',
            'nama' => 'Politik',
            'keterangan' => 'Berisi berita seputar politik'
        ]);

        DB::terhubung()->input('kategori', [
            'id' => 'aTphF53b87Td',
            'nama' => 'Bisnis',
            'keterangan' => 'Berisi berita seputar bisnis'
        ]);
    }
}
$create = new kategori();
$create->buattabel();
