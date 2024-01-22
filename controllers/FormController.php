<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;
use App\Models\Users;

class FormController extends Controller
{

    public function index()
    {
        $this->view('form/index', [
            'title' => 'Form Contoh',
            'users' => Users::all()
        ]);
    }

}