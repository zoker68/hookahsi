<?php

use Core\Router;

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

    view('errors/' . $code, ['code' => $code]);
}

function view($template, $attributes = [], $layout = "index"): void
{
    extract($attributes);

    $config = require basePath('config.php');

    $headTitle = $headTitle ?? '' . $config['main']['title'];

    require basePath('views/layouts/' . $layout . '.view.php');
}

function viewContent($template, $attributes = []): void
{
    extract($attributes);

    require basePath('views/' . $template . '.view.php');
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] == $value;
}

function route($name): string
{
    return Router::getRoute($name);
}

function redirect($uri): void
{
    header("location: " . $uri);
    exit;
}

function method($value): string
{
    return '<input type="hidden" name="_method" value="' . $value . '">';
}
