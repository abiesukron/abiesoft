<?php 

namespace App\Models;

use AbieSoft\Application\Collection\Data;
use AbieSoft\Application\Collection\Fillable;

class Home extends Fillable 
{
    use Data;

    public function __construct()
    {
        /*
            Tambahkan tanda seru (!) untuk kolom file
            dan kolom dengan value default
            Fillable::$set = [];
        */
    }
}

new Home();