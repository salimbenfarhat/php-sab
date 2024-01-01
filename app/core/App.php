<?php
namespace PHP_SAB;
class App {
    private $route;
    
    public function __construct() {
        $this->route = new Route();
        $this->route->processRequest();
    }
}