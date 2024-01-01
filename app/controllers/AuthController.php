<?php
namespace PHP_SAB\Controllers;
use PHP_SAB\Config, PHP_SAB\Database, PHP_SAB\View;

class AuthController {
  
  protected $data = [];
  public function __construct() {
    $this->data['baseUrl'] = Config::BASE_URL;
  }

  public function redirectToLogin() {
    header('Location: /auth/connexion');
    exit();
  }
  public function login() {
    $this->data['pageTitle'] = 'Connexion';
    $view = new View();
    $view->render('login', 'default', $this->data, 'auth');
  }
  public function signup() {
    $this->data['pageTitle'] = 'Inscription';
    $view = new View();
    $view->render('signup', 'default', $this->data, 'auth');
  }
  public function resetId() {
    $this->data['pageTitle'] = 'Réinitialisation Identifiant';
    $view = new View();
    $view->render('resetId', 'default', $this->data, 'auth');
  }
  public function resetPassword() {
    $this->data['pageTitle'] = 'Réinitialisation Mot de passe';
    $view = new View();
    $view->render('resetPassword', 'default', $this->data, 'auth');
  }
}