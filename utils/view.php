<?php

namespace Utils;

class View
{
    public static function render($view, $context=[])
    {
        extract($context);
        require_once "app/views/$view.php";
    }
}
