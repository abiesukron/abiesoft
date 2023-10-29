<?php 

namespace App\Controllers;

use AbieSoft\Application\Http\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->view('home/index',[
            'title' => 'Home',
        ]);
    }

}