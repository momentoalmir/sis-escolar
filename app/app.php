<?php

namespace App;


class App
{
    private $router;

    public function __construct()
    {
        $this->router = new \Utils\Router();
    }

    public function getRouter()
    {
        return $this->router;
    }

}
