<?php
namespace PHP_SAB;
class App {
    public function __construct() {
        $this->route = new Route();
        $this->route->processRequest();
    }
}
