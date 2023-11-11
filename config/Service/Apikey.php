<?php 

namespace App\Service;

use AbieSoft\Application\Http\Lanjut;
use AbieSoft\Application\Utilities\Input;
use App\Service\Auth\Seting;
use App\Service\Auth\Tabel\TabelBerita;
use App\Service\Auth\Tabel\TabelGrup;
use App\Service\Auth\Tabel\TabelUsers;

class Apikey 
{
    public function index () {
        $model = Input::get('mdl');
        $function = Input::get('fc');
        $id = Input::get('id');
        return match($model) {
            'seting' => $this->seting($function, $id),
            'tabel' => $this->tabel($function, $id),
            default => Lanjut::ke('/')
        };
    }

    protected function seting ($function, $id) {
        $seting = new Seting;
        return match ($function) {
            'toggle' => $seting->toggle($id),
            default => Lanjut::ke('/')
        };
    }

    protected function tabel ($function, $search) {
        return match ($function) {
            'berita' => TabelBerita::index($search),
            'users' => TabelUsers::index($search),
            'grup' => TabelGrup::index($search),
            default => Lanjut::ke('/')
        };
    }

}