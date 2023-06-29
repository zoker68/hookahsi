<?php

use Core\Router;
use Core\Session;
use Core\Validation\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "vendor/autoload.php";

require BASE_PATH . "Core/bootstrap.php";

require BASE_PATH . "Core/functions.php";

$router = new Router();
require BASE_PATH . "routes.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($method, $uri);
    Session::unFlash();
} catch (ValidationException $exception) {
    Session::flash('error', $exception->error);
    Session::flash('old', $exception->old);

    redirect(previousUrl());
}


