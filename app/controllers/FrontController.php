<?php
namespace PHP_SAB;
class FrontController {
  protected $data = [];
  public function __construct() {
    $this->data['baseUrl'] = Config::BASE_URL;
  }
  public function home() {
    $database = new Database();
    $conn = $database->getConnection();
    if ($conn) {
      $this->data['message'] = 'Successfully connected to the database.';
    } else {
      $this->data['message'] = 'Failed to connect to the database.';
    }
    $this->data['pageTitle'] = 'Home';
    $view = new View();
    $view->render('home', 'default', $this->data);
  }
  public function about() {
    $this->data['pageTitle'] = 'About';
    $view = new View();
    $view->render('about', 'default', $this->data);
  }
  public function contact() {
    $this->data['pageTitle'] = 'Contact';
    $view = new View();
    $view->render('contact', 'default', $this->data);
  }
}