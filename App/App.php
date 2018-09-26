<?php
namespace App;

use grgit\Lib\Route;

class App
{
    private $router;
    private $middleware;

    public function __construct()
    {
        $path_info = $_SERVER['PATH_INFO'] ?? '/';
        $request_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->router = new Route($path_info, $request_method);
    }

    public function middleware($mode)
    {
        $this->router->middleware = "App\\Middlewares\\".$mode;
        return $this;
    }

    public function get(string $path, string $fn, $middleware = '')
    {
        $this->router->get($path, $fn, $middleware);
    }

    public function post(string $path, string $fn, $middleware = '')
    {
        $this->router->post($path, $fn, $middleware);
    }

    public function run()
    {
        $route = $this->router->run();
        if(!empty($route['middleware'])) {
            $middleware = "App\\Middlewares\\".$route['middleware'];
            if(!(new $middleware)->run()) {
                http_response_code(401);
                die('unauthorized request');
            }
        }
        $raw = explode('@', $route['callback']);
        $class = "App\\Controllers\\".$raw[0];
        $method = $raw[1];
        (new $class)->$method($route['param']);
    }

}