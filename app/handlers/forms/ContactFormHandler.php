<?php
namespace PHP_SAB;

use PHP_SAB\Config;
use PHP_SAB\FormHandler;

class ContactFormHandler {
    public static function processForm($formData) {
        $validationRules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required']
            // Ajoutez d'autres règles au besoin
        ];
       
        $errors = FormHandler::validateForm($formData, $validationRules);

        if (empty($errors)) {
            // Le formulaire est valide, traiter les données ici

            // Exemple : envoyer un email
            mail('destinataire@example.com', 'Nouveau message de contact', $formData['message']);

            // Redirection après le traitement
            header('Location: ' . Config::BASE_URL . '/contact-success');
            exit();
        } else {
            // Le formulaire contient des erreurs, les afficher dans la vue ou logguer selon le besoin
            return $errors;
        }
        
    }
}
