<?php
namespace PHP_SAB;

class View {
    public function render($view, $layout, $data = [], $path = 'front') {
        $content = Controller::loadView($view, $data, $path);
        require_once Config::BASE_PATH . '/views/layouts/' . $layout . '.layout.php';
    }
}