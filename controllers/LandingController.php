<?php 

namespace App\Controllers;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Http\Controller;
use AbieSoft\Application\Utilities\Config;

class LandingController extends Controller
{

    public function index()
    {
        $auth = new Authentication;
        $this->view('landing/index', [
            'title' => 'Landing Page',
            'isLogin' => $auth->isLogin(),
            'dashboard' => Config::baseUrl()."/".Config::envReader('SESSIONKEY').'/dashboard'
        ]);
    }

}