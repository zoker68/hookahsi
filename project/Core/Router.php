<?php

namespace Core;

class Router
{
    private static array $routes = [];

    private function add($method, $uri, $controller): Router
    {
        if (is_array($controller)) {
            list($controller, $action) = $controller;
        }

        static::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action ?? null,
            'name' => null,
            'middleware' => [],
        ];

        return $this;
    }

    public function get($uri, $controller): Router
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): Router
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): Router
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): Router
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function name($name): Router
    {
        static::$routes[array_key_last(static::$routes)]['name'] = $name;
        return $this;
    }

    public function middleware($keys): Router
    {
        if (is_string($keys)) {
            $keys[] = $keys;
        }

        static::$routes[array_key_last(static::$routes)]['middleware'] = $keys;

        return $this;
    }

    public function route($method, $uri)
    {

        foreach (static::$routes as $route) {
            if ($route['method'] == strtoupper($method) and $route['uri'] == $uri) {

                if (!empty($route['middleware'])) {
                    foreach ($route['middleware'] as $key) {
                        Middleware::resolve($key);
                    }
                }

                if (!class_exists($route['controller'])) {
                    throw new \Exception("Class ".$route['controller']." does not exist");
                }

                $controller = new $route['controller'];

                if ($route['action'] && method_exists($route['controller'],$route['action'])) {
                    return $controller->{$route['action']}();
                }

                return $controller();
            }
        }

        abort(404);
    }

    public static function getRoute($name): string
    {
        foreach (static::$routes as $route) {
            if ($route['name'] == $name) {
                return $route['uri'];
            }
        }

        throw new \Exception("Route name \"{$name}\" does not find!");
    }
}