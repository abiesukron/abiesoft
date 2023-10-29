<?php 

namespace App\Models;

use AbieSoft\Application\Collection\Data;
use AbieSoft\Application\Collection\Fillable;

class Berita extends Fillable 
{
    use Data;

    public function __construct()
    {
        Fillable::$set = [
            'judul',
            'isi',
            'potongan',
            'kategoriid',
            'tag',
            '!gambar',
            'editing',
            'editorid',
            'publikasi',
            'uid'
        ];
    }
}

new Berita();