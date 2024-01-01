<?php
namespace PHP_SAB;
class FormHandler {
    public static function validateForm($formData, $validationRules) {
        $errors = [];

        foreach ($validationRules as $fieldName => $rules) {
            foreach ($rules as $rule) {
                switch ($rule) {
                    case 'required':
                        if (empty($formData[$fieldName])) {
                            $errors[$fieldName][] = "Le champ $fieldName est obligatoire.";
                        }
                        break;
                    case 'email':
                        if (!filter_var($formData[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $errors[$fieldName][] = "L'adresse email n'est pas valide.";
                        }
                        break;
                    // Ajoutez d'autres règles de validation au besoin
                }
            }
        }

        return $errors;
    }
}
