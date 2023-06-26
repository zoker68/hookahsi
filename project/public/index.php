<?php

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "/Core/functions.php";

$router = new Router();
require BASE_PATH . "routes.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($method, $uri);


