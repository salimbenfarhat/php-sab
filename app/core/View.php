<?php
namespace PHP_SAB;
class View {
    public function render($view, $layout, $data = []) {
        $content = $this->loadView($view, $data);
        require_once Config::BASE_PATH . '/views/layouts/' . $layout . '.html';
    }

    public function loadView($view, $data) {
        ob_start();
        extract($data);
        require_once Config::BASE_PATH . '/views/front/' . $view . '.view.php';
        return ob_get_clean();
    }
}