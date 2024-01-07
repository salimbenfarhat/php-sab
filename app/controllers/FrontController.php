<?php
namespace PHP_SAB\Controllers;
use PHP_SAB\Config, PHP_SAB\Database, PHP_SAB\View, PHP_SAB\ContactFormHandler;

class FrontController {
  protected $data = [];
  public function __construct() {
    $this->data['baseUrl'] = Config::BASE_URL;
  }
  public function home() {
    $database = new Database();
    $conn = $database->getConnection();
    if ($conn) {
      $this->data['message'] = 'Connexion à la base de données reussie.';
    } else {
      $this->data['message'] = 'Echec de la connexion à la base de données.';
    }
    $this->data['pageTitle'] = 'Accueil';
    $view = new View();
    $view->render('home', 'default', $this->data);
  }
  public function about() {
    $this->data['pageTitle'] = 'About';
    $view = new View();
    $view->render('about', 'default', $this->data);
  }
  public function contact() {
    $this->data['errors'] = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $formData = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'message' => $_POST['message'] ?? ''
        ];
        $errors = ContactFormHandler::processForm($formData);
        if (!empty($errors)) {
            $this->data['errors'] = $errors;
        }
    }
    $this->data['pageTitle'] = 'Contact';
    $view = new View();
    $view->render('contact', 'default', $this->data);
  }
}