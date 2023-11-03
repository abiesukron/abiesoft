<?php 

namespace AbieSoft\Application\Http;

use AbieSoft\Application\Utilities\Config;
use ErrorException;

class Route 
{
    protected static array $routes = [];
    protected static array $dataRoute;

    protected static function get(string $path, string|array $callback): array|string
    {
        return self::$routes['get'][$path] = $callback;
    }

    protected static function post(string $path, string|array $callback): array|string
    {
        return self::$routes['post'][$path] = $callback;
    }

    protected static function patch(string $path, string|array $callback): array|string
    {
        return self::$routes['patch'][$path] = $callback;
    }

    protected static function delete(string $path, string|array $callback): array|string
    {
        return self::$routes['delete'][$path] = $callback;
    }

    public static function getRoute(): array
    {
        foreach (Config::yamlReader() as $key => $value) 
        {
            if (is_array($value)) 
            {
                if(isset($value['admin'])){
                    Route::get("/".Config::envReader('SESSIONKEY')."/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'index']);
                    Route::get("/".Config::envReader('SESSIONKEY')."/" . $key . "/add", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'add']);
                    Route::get("/".Config::envReader('SESSIONKEY')."/" . $key . "/{id}/edit", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'edit']);
                    Route::get("/".Config::envReader('SESSIONKEY')."/" . $key . "/{id}", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'read']);
                    Route::post("/".Config::envReader('SESSIONKEY')."/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'keep']);
                    Route::patch("/".Config::envReader('SESSIONKEY')."/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'update']);
                    Route::delete("/".Config::envReader('SESSIONKEY')."/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'delete']);
                }else{
                    $method = $value['method'];
                    Route::$method($value['path'], ["\App\Controllers\\" . $value['controller'], $value['function']]);
                }
            } else {
                // Route::get("/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'index']);
                // Route::get("/" . $key . "/add", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'add']);
                // Route::get("/" . $key . "/{id}/edit", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'edit']);
                // Route::get("/" . $key . "/{id}", ["\App\Controllers\\" . ucfirst($key) . "Controller", 'read']);
                // Route::post("/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'keep']);
                // Route::patch("/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'update']);
                // Route::delete("/" . $key, ["\App\Controllers\\" . ucfirst($key) . "Controller", 'delete']);
            }
        }

        /*
            Default System
        */
        Route::get("/reset", ["\Abiesoft\Application\\Auth\\Authentication", 'reset']);
        Route::get("/logout", ["\Abiesoft\Application\\Auth\\Authentication", 'logout']);
        Route::get("/login", ["\Abiesoft\Application\\Auth\\Authentication", 'login']);
        Route::post("/login", ["\Abiesoft\Application\\Auth\\Authentication", 'setLogin']);
        Route::get("/registrasi", ["\Abiesoft\Application\\Auth\\Authentication", 'registrasi']);
        Route::post("/registrasi", ["\Abiesoft\Application\\Auth\\Authentication", 'setRegistrasi']);
        Route::get("/konfirmasi{rid}", ["\Abiesoft\Application\\Auth\\Authentication", 'konfirmasi']);
        Route::get("/google-auth{code}{scope}{authuser}{prompt}", ["\Abiesoft\Application\\Auth\\Authentication", 'googleAuth']);
        Route::post("/konfirmasi", ["\Abiesoft\Application\\Auth\\Authentication", 'setKonfirmasi']);
        Route::get("/".Config::envReader('SESSIONKEY')."/profile/{id}", ["\Abiesoft\Application\\Auth\\Authentication", 'profile']);
        Route::get("/".Config::envReader('SESSIONKEY')."/profile/{id}", ["\Abiesoft\Application\\Auth\\Authentication", 'profile']);
        Route::patch("/".Config::envReader('SESSIONKEY')."/profile", ["\Abiesoft\Application\\Auth\\Authentication", 'setProfile']);
        Route::delete("/".Config::envReader('SESSIONKEY')."/profile", ["\Abiesoft\Application\\Auth\\Authentication", 'dropProfile']);
        Route::patch("/".Config::envReader('SESSIONKEY')."/ganti-photo", ["\Abiesoft\Application\\Auth\\Authentication", 'photoProfile']);
        Route::delete("/".Config::envReader('SESSIONKEY')."/hapus-photo", ["\Abiesoft\Application\\Auth\\Authentication", 'hapusPhotoProfile']);
        Route::get("/".Config::envReader('SESSIONKEY')."/seting", ["\Abiesoft\Application\\Auth\\Authentication", 'seting']);
        Route::post("/".Config::envReader('SESSIONKEY')."/seting", ["\Abiesoft\Application\\Auth\\Authentication", 'setSeting']);
        Route::get("/".Config::envReader('SESSIONKEY')."/dashboard", ["\App\Controllers\HomeController", 'index']);

        /*
            Apikey Service Internal
        */
        Route::get("/".Config::envReader('APIKEY').'{mdl}{fc}{id}', ["\App\Service\Apikey", 'index']);

        /*
            Apikey Service Public
        */
        Route::get("/service{apikey}{tb}{fc}", ["\App\Service\Apikey", 'public']);

        return self::$routes;
    }

    public static function currentPage(): string|array
    {
        $method = Request::Method();
        $path = Request::Path();
        $req = Request::ID();
        $Session = Request::Session();
        $callback = self::$routes[$method][$path] ?? 'error';

        self::$dataRoute = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
            'id' => $req,
            'session' => $Session
        ];

        return self::$dataRoute;
    }
}