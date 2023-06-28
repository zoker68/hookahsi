<?php

use App\Controllers\Auth\RegisterController;
use App\Controllers\Index\IndexController;
use Core\Router;

$router = new Router();


$router->get("/", IndexController::class)->name('index');

$router->get("/todo", IndexController::class)->name('todo')->middleware(['auth']);

$router->get("/register", [RegisterController::class, 'create'])->name('register')->middleware(['guest']);
$router->post("/register", [RegisterController::class, 'store'])->name('register.store')->middleware(['guest']);

$router->get("/login", [RegisterController::class, 'create'])->name('login')->middleware(['guest']);


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($method, $uri);

