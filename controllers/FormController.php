<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;

class FormController extends Controller
{

    public function index()
    {
        $this->view('form/index', [
            'title' => 'Form Contoh',
        ]);
    }

}