<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);

        $this->routes[] =
            [
                'path' => $path,
                'method' => strtoupper($method),
                'controller' => $controller
            ];
    }

    public function dispatch(string $path, string $method, Container $container = null)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route["path"]}$#", $path) ||
                $method !== $route['method']
            ) {
                continue;
            }

            [$controller, $function] = $route['controller'];

            $controllerInstance = $container->resolve($controller);

            $controllerInstance->$function();
        }
    }

    public function normalizePath(string $path)
    {

        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace("#[//]{2,}#", '', $path);

        return $path;
    }
}
