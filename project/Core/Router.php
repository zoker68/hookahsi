<?php

namespace Core;

class Router
{
    private array $routes = [];

    private function add($method, $uri, $controller): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function get($uri, $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function route($method, $uri)
    {

        foreach ($this->routes as $route) {
            if ($route['method'] == $method and $route['uri'] == $uri) {
                $controller = new $route['controller']();
                return $controller();
            }
        }

        abort(404);

    }
}