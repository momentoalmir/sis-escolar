<?php

namespace App;

class Router
{
    private $routes = [];
    private $baseURL;

    public function __construct($baseURL='/')
    {
        $this->baseURL = $baseURL;
    }

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function put($path, $callback)
    {
        $this->routes['PUT'][$path] = $callback;
    }

    public function delete($path, $callback)
    {
        $this->routes['DELETE'][$path] = $callback;
    }

    public function abort($code=404)
    {
        http_response_code($code);
        exit();
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        $path = str_replace($this->baseURL, '', $path);

        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            $callback();
        } else {
            $this->abort();
        }
    }
}
