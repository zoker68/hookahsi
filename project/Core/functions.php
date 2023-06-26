<?php


function dd($value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function basePath($uri): string
{
    return BASE_PATH . $uri;
}

function abort($code = 404): void
{
    http_response_code($code);

    require basePath('views/errors/' . $code . '.view.php');
}

function view($template, $attributes = []): void
{
    extract($attributes);

    require basePath('views/' . $template . '.view.php');
}

