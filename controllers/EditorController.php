<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;

class EditorController extends Controller
{

    public function index()
    {
        $this->view('editor/index', [
            'title' => 'Editor',
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
        /* Halaman tambah */
    }

    public function edit($id)
    {
        /* Halaman edit */
    }

    public function read($id)
    {
        /* Halaman detail */
    }

    public function keep()
    {
        /* Tambah data, methodnya post */
    }

    public function update()
    {
        /* Edit data, methodnya patch */
    }

    public function delete()
    {
        /* Hapus data, methodnya delete */
    }

}