<?php

namespace App\Core;

class Router
{
    private $routes = [];
    private $notFoundCallback;

    public function add($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function setNotFound($callback)
    {
        $this->notFoundCallback = $callback;
    }

    public function dispatch($method, $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method) && $this->match($route['path'], $uri, $params)) {
                return $this->invoke($route['callback'], $params);
            }
        }

        if ($this->notFoundCallback) {
            return call_user_func($this->notFoundCallback);
        }

        return "404 Not Found";
    }

    private function match($path, $uri, &$params)
    {
        $regex = preg_replace('/{([\w]+)}/', '(?P<\1>[\w-]+)', $path);
        $regex = "#^{$regex}$#";
        if (preg_match($regex, $uri, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return true;
        }
        return false;
    }

    private function invoke($callback, $params)
    {
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        }

        if (is_array($callback) && class_exists($callback[0]) && method_exists($callback[0], $callback[1])) {
            $controller = new $callback[0]();
            return call_user_func_array([$controller, $callback[1]], $params);
        }

        throw new \Exception("Invalid route callback");
    }
}
