<?php

/**
 * @param string $path
 * @return string
 */
function url(string $path = null): string
{
    if ($_SERVER['HTTP_HOST'] == "localhost") {
        if ($path) {
            return $_ENV["CONF_URL_TEST"] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return $_ENV["CONF_URL_TEST"];
    }

    if ($path) {
        return $_ENV["CONF_URL_BASE"] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return $_ENV["CONF_URL_BASE"];
}

/**
 * @param string $path
 * @return string
 */
function assets(string $path = null): string 
{
    return url("/public/$path");
}

function view(string $view, array $data = [])
{
    $v = new Jenssegers\Blade\Blade("themes/views", "themes/cache");
    echo $v->render($view,$data);
    return;
}