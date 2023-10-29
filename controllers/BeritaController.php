<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;
use AbieSoft\Application\Utilities\Config;
use App\Models\Berita;
use App\Models\Kategori;

class BeritaController extends Controller
{

    public function index()
    {
        $this->view('berita/index', [
            'title' => 'Berita',
            'totalberita' => Berita::all(output:'hitung')
        ]);
    }

    public function table()
    {
        /*
            Defaultnya function ini digunakan untuk meload data tabel
            yang digunakan untuk function index
        */
    }

    public function add()
    {
        $this->view('berita/add', [
            'title' => 'Berita Baru',
            'kategori' => Kategori::all()
        ]);
    }

    public function edit($id)
    {
        $this->view('berita/edit', [
            'title' => 'Edit Berita',
            'id' => $id,
            'kategori' => Kategori::all(),
            'judul' => Berita::only(select: ['judul'], id:$id, output:'string'),
            'potongan' => Berita::only(select: ['potongan'], id:$id, output:'string'),
            'isi' => Berita::only(select: ['isi'], id:$id, output:'string'),
            'kategoriid' => Berita::only(select: ['kategoriid'], id:$id, output:'string'),
            'kategorilabel' => Kategori::only(select: ['nama'], id:Berita::only(select: ['kategoriid'], id:$id, output:'string'), output:'string'),
            'publikasi' => Berita::only(select: ['publikasi'], id:$id, output:'string'),
            'tag' => Berita::only(select: ['tag'], id:$id, output:'string'),
        ]);
    }

    public function read($id)
    {
        $this->view('berita/detail', [
            'title' => 'Detail Berita',
            'id' => $id,
            'judul' => Berita::only(select: ['judul'], id:$id, output:'string'),
            'potongan' => Berita::only(select: ['potongan'], id:$id, output:'string'),
            'isi' => Berita::only(select: ['isi'], id:$id, output:'string'),
            'kategorilabel' => Kategori::only(select: ['nama'], id:Berita::only(select: ['kategoriid'], id:$id, output:'string'), output:'string'),
            'publikasi' => Berita::only(select: ['publikasi'], id:$id, output:'string'),
            'tag' => Berita::only(select: ['tag'], id:$id, output:'string'),
            'gambar' => Config::baseUrl() . Berita::only(select: ['gambar'], id:$id, output:'string')
        ]);
    }

    public function keep()
    {
        echo Berita::insert();
    }

    public function update()
    {
        echo Berita::replace();
    }

    public function delete()
    {
        echo Berita::remove();
    }

}