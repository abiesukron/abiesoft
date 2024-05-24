<?php

namespace AbieSoft\Application;

use AbieSoft\Application\Auth\Authentication;
use AbieSoft\Application\Http\Controller;
use AbieSoft\Application\Http\Lanjut;
use AbieSoft\Application\Http\Route;

class LoadSys
{

    public function start()
    {
        Route::getRoute();
        $route = Route::currentPage();

        $method = $route['method'];
        $path = $route['path'];
        $callback = $route['callback'];
        $id = $route['id'];
        $session = $route['session'];

        $auth = new Authentication;

        if ($path == "/login" || $path == '/registrasi' || $path == '/setLogin' || $path == '/setRegistrasi') {
            if ($auth->isLogin()) {
                Lanjut::ke('/');
            }
        } else {
            if ($session == "secure") {
                if (!$auth->isLogin()) {
                    Lanjut::ke('/login');
                }
            }
        }

        $controller = new Controller();

        if ($callback !== "error") {
            if (is_array($callback)) {
                $this->run($method, $path, $id, $callback);
            } else {
                die($callback);
            }
        } else {
            $controller = new Controller;
            $controller->view(403);
        }
    }

    public function run(string $method, string $path, string $id = "", array $callback)
    {
        $controller = new $callback[0]();
        $function = $callback[1];
        ($method == "get" && str_ends_with($path, "/{id}/edit")
            || $method == "get" && str_ends_with($path, "/{id}"))
            ? $controller->$function($id) : $controller->$function();
    }
}
