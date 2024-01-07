<?php
namespace PHP_SAB;

class Controller {
    protected $data;
    public static function loadView($view,  $data = [], $path = 'front') {
        ob_start();
        extract($data);
        $viewPath = Config::BASE_PATH . '/views/' . $path . '/' . $view . '.view.php';
        require_once $viewPath;
        return ob_get_clean();
    }
}