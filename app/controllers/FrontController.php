<?php
namespace PHP_SAB;
class FrontController {
    public function home() {
      $database = new Database();
      $conn = $database->getConnection();
      $data = [];
      if ($conn) {
          $data['message'] = 'Successfully connected to the database.';
      } else {
          $data['message'] = 'Failed to connect to the database.';
      }
      $view = new View();
      $view->render('home', 'default', $data);
    }
    public function about() {
      $view = new View();
      $view->render('about', 'default');
    }
    public function contact() {
      $view = new View();
      $view->render('contact', 'default');
    }
}