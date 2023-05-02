<?php

namespace Utils;

class View
{
    public static function render($view, $context=[])
    {
        // Render view with context inside the layout
        $content = self::renderView($view, $context);
        self::renderLayout($content);
    }

    private static function renderView($view, $context)
    {
        // Extract context variables
        extract($context);

        // Render view
        ob_start();
        require_once "app/views/$view.php";
        $content = ob_get_clean();

        return $content;
    }


    private static function renderLayout($content)
    {
        // Render layout and insert content
        ob_start();
        require_once 'app/views/layout.php';
        $layout = ob_get_clean();

        echo str_replace('{{ content }}', $content, $layout);
    }

}
