<?php

namespace Utils;

class Router
{
    private $routes;
    private $baseURL;

    public function __construct($routes=[], $baseURL='')
    {
        $this->routes = $routes;
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

    public static function redirect($path)
    {
        header('Location: ' . $path);
        exit();
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];

        $path = str_replace($this->baseURL, '', $path);
        // Remove query string
        $path = explode('?', $path)[0];

        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            $callback();
        } else {
            $this->abort();
        }
    }
}
