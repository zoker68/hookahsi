<?php

use App\Controllers\Auth\AuthenticatedSessionController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\TodoController;
use App\Controllers\Index\IndexController;


$router->get("/", IndexController::class)->name('index');

$router->get("/todo", [TodoController::class, 'index'])->name('todo.index')->middleware(['auth']);
$router->get("/todo/create", [TodoController::class, 'create'])->name('todo.create')->middleware(['auth']);
$router->post("/todo", [TodoController::class, 'store'])->name('todo.store')->middleware(['auth']);
$router->get("/todo/", [TodoController::class, 'show'])->name('todo.show')->middleware(['auth']);

$router->get("/register", [RegisterController::class, 'create'])->name('register')->middleware(['guest']);
$router->post("/register", [RegisterController::class, 'store'])->name('register.store')->middleware(['guest']);

$router->get("/login", [AuthenticatedSessionController::class, 'create'])->name('login.create')->middleware(['guest']);
$router->post("/login", [AuthenticatedSessionController::class, 'store'])->name('login.store')->middleware(['guest']);
$router->delete("/logout", [AuthenticatedSessionController::class, 'delete'])->name('login.delete')->middleware(['auth']);


