<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;
use App\Models\Grup;

class GrupController extends Controller
{

    public function index()
    {
        $this->view('grup/index', [
            'title' => 'Grup',
            'totalgrup' => Grup::all(output:'hitung')
        ]);
    }

    public function add()
    {
        $this->view('grup/add', [
            'title' => 'Buat Grup',
        ]);
    }

    public function edit($id)
    {
        $this->view('grup/edit', [
            'title' => 'Edit Grup',
            'id' => $id,
            'nama' => Grup::only(select:['nama'],output:'string',id:$id),
            'keterangan' => Grup::only(select:['keterangan'],output:'string',id:$id),
            'role' => Grup::only(select:['role'],output:'string',id:$id),
        ]);
    }

    public function read($id)
    {
        /* Halaman detail */
    }

    public function keep()
    {
        echo Grup::insert();
    }

    public function update()
    {
        echo Grup::replace();
    }

    public function delete()
    {
        echo Grup::remove();
    }

}