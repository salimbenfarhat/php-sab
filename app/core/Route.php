<?php
namespace PHP_SAB;
class Route {
    public function processRequest() {
        $url = $_SERVER['REQUEST_URI'];
        $json = file_get_contents('../routes/web.json');
        $routes = json_decode($json, true)['routes'];

        foreach ($routes as $route) {
            if ($url == $route['path']) {
                $controller = 'PHP_SAB\\' . $route['controller'];
                $method = $route['method'];
                $controller = new $controller;
                $controller->$method();
                break;
            }
        }
    }
}