<?php
namespace PHP_SAB;

class Route {
    public function processRequest() {
        $url = $_SERVER['REQUEST_URI'];
        $json = file_get_contents(Config::ROUTES_PATH);
        $routes = json_decode($json, true)['routes'];
        foreach ($routes as $route) {
            $pattern = str_replace('/', '\/', $route['path']);
            $pattern = preg_replace('/:([a-zA-Z0-9_]+)/', '([^\/]+)', $pattern);
            if (preg_match('/^' . $pattern . '$/', $url, $matches)) {
                array_shift($matches);
                $controller = 'PHP_SAB\Controllers\\' . $route['controller'];
                $method = $route['method'];
                $controller = new $controller;
                call_user_func_array([$controller, $method], $matches);
                break;
            }
        }
    }
}