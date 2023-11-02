<?php 

namespace App\Schema;

use AbieSoft\Application\Mysql\DB;
use AbieSoft\Application\Mysql\Schema;

class berita extends Schema 
{

    public function buattabel()
    {
        $schema = new Schema;
        $schema->teks('judul');
        $schema->paragrap('slug');
        $schema->paragrap('isi');
        $schema->paragrap('potongan');
        $schema->teks('kategoriid');
        $schema->teks('tag');
        $schema->teks('gambar');
        $schema->tanggal('editing');
        $schema->teks('editorid');
        $schema->teks('publikasi');
        $schema->teks('uid');
        $sql = $schema->create('berita');
        DB::terhubung()->query($sql);
        $this->buatdata();
    }

    public function buatdata()
    {
        
    }
}
$create = new berita();
$create->buattabel();
