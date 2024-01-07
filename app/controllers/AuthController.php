<?php
namespace PHP_SAB\Controllers;
use PHP_SAB\Config, PHP_SAB\Database, PHP_SAB\Models\UserModel, PHP_SAB\View, PHP_SAB\FormHandler;

class AuthController {
  protected $data = [];
  public function __construct() {
    $this->data['baseUrl'] = Config::BASE_URL;
  }
  public function redirectToLogin() {
    header('Location: ' . Config::BASE_URL . '/auth/connexion');
    exit();
  }
  public function login() {
    $this->data['pageTitle'] = 'Connexion';
    $view = new View();
    $view->render('login', 'default', $this->data, 'auth');
  }
  public function signup() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $user = $this->createUser($email, $password);
      if ($user) {
          $this->signupEmailActivation($user);
          header('Location: ' . Config::BASE_URL . '/auth/inscription/confirmation');
          exit();
      } else {
          $this->data['signupError'] = 'Une erreur s\'est produite lors de l\'inscription.';
      }
    }
    $this->data['pageTitle'] = 'Inscription';
    $view = new View();
    $view->render('signup', 'default', $this->data, 'auth');
  }
  public function signupConfirmation() {
    $this->data['pageTitle'] = 'Confirmation Inscription';
    $view = new View();
    $view->render('signup/confirmation', 'default', $this->data, 'auth');
  }
  private function createUser($email, $password) {
    $userModel = new UserModel();
    $result = $userModel->createUser($email, $password);
    return $result;
  }
  private function signupEmailActivation($user) {
    $fromEmail = 'noreply@example.com';
    $subject = 'Confirmation de compte - PHP-SAB';
    $verificationLink = Config::BASE_URL . '/auth/inscription/verification/' . $user['verification_token'];
    $message = "Bonjour,\n\n";
    $message .= "Merci de vous être inscrit sur PHP-SAB. Veuillez cliquer sur le lien ci-dessous pour confirmer votre compte :\n\n";
    $message .= $verificationLink . "\n\n";
    $message .= "Cordialement,\nPHP-SAB";
    $headers = 'From: ' . $fromEmail . "\r\n" .
                'Reply-To: ' . $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    mail($user['email'], $subject, $message, $headers);
  }
  public function signupAccountValidation($token) {
      $token = trim($token);
      $userModel = new UserModel();
      $user = $userModel->getUserByVerificationToken($token);
      if ($user) {
          $userModel->updateUserVerificationStatus($user['id']);
          header('Location: ' . Config::BASE_URL . '/auth/inscription/verification-reussie');
          exit();
      } else {
          header('Location: ' . Config::BASE_URL . '/auth/inscription/verification-echouee');
          exit();
      }
  }
  public function signupVerifySuccess() {
      $this->data['pageTitle'] = 'Vérification réussie';
      $view = new View();
      $view->render('signup/verification/success', 'default', $this->data, 'auth');
  }
  public function signupVerifyFail(){
      $this->data['pageTitle'] = 'Échec de la vérification';
      $view = new View();
      $view->render('signup/verification/fail', 'default', $this->data, 'auth');
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