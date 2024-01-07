<?php
namespace PHP_SAB;
use PHP_SAB\Config, PHP_SAB\FormHandler;

class ContactFormHandler {
    public static function processForm($formData) {
        $validationRules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required']
        ];
        $errors = FormHandler::validateForm($formData, $validationRules);
        if (empty($errors)) {
            mail('destinataire@example.com', 'Nouveau message de contact', $formData['message']);
            header('Location: ' . Config::BASE_URL . '/contact');
            exit();
        } else {
            return $errors;
        }
    }
}
