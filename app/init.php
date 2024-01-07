<?php
$namespace = 'PHP_SAB';
spl_autoload_register(function ($class_name) use ($namespace) {
    if (strpos($class_name, $namespace) === 0) {
        $class_name = str_replace($namespace . '\\', '', $class_name);
    }
    $base_dir = __DIR__ . '/';
    $folder = '';
    switch (true) {
        case strpos($class_name, 'Controller') !== false && $class_name !== 'Controller':
            $folder = 'controllers';
            $class_name = str_replace('Controllers\\', '', $class_name);
            break;
        case strpos($class_name, 'FormHandler') !== false && $class_name !== 'FormHandler':
            $folder = 'handlers/forms';
            break;
        case strpos($class_name, 'Model') !== false && $class_name !== 'Model':
            $folder = 'models';
            $class_name = str_replace('Models\\', '', $class_name);
            break;
        default:
            $folder = 'core';
            break;
    }
    $file = $base_dir . $folder . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier n'existe pas.\n";
    }
});
$app = new PHP_SAB\App;