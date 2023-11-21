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
      $this->data['message'] = 'Connexion à la base de données reussie.';
    } else {
      $this->data['message'] = 'Echec de la connexion à la base de données.';
    }
    $this->data['pageTitle'] = 'Accueil';
    $view = new View();
    $view->render('home', 'default', $this->data);
  }
  public function about() {
    $this->data['pageTitle'] = 'A propos';
    $view = new View();
    $view->render('about', 'default', $this->data);
  }
  public function contact() {
    $this->data['pageTitle'] = 'Contact';
    $view = new View();
    $view->render('contact', 'default', $this->data);
  }
}