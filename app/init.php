<?php
$namespace = 'PHP_SAB';

spl_autoload_register(function ($class_name) use ($namespace) {
    if (strpos($class_name, $namespace) === 0) {
        $class_name = str_replace($namespace . '\\', '', $class_name);
    }
    $base_dir = __DIR__ . '/';
    $folder = '';
    if (strpos($class_name, 'Controller') !== false && $class_name !== 'Controller') {
        $folder = 'controllers';
        $class_name = str_replace('Controllers\\', '', $class_name);
    } elseif (strpos($class_name, 'FormHandler') !== false && $class_name !== 'FormHandler') {
        $folder = 'handlers/forms';
    } else {
        $folder = 'core';
    }
    $file = $base_dir . $folder . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier n'existe pas.\n";
    }
});

// Instancier la classe App ici
$app = new PHP_SAB\App;
