<?php
namespace PHP_SAB;
class FrontController {
    public function home() {
        echo 'Home';
        echo '</br>';
        $database = new Database();
        $conn = $database->getConnection();
        if ($conn) {
            echo 'Successfully connected to the database.';
        } else {
            echo 'Failed to connect to the database.';
        }
    }
    public function about() {
        echo 'About';
    }
    public function contact() {
        echo 'Contact';
    }
}