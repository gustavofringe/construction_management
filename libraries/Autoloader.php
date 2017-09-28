<?php
class Autoloader{
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        if($class !== "model" && isset($class)) {
            include ROOT . '/controller/' . $class . 'Controller.php';
        }
        if($class !== "model") {
            include ROOT . '/views/' . $class . '.php';
        }
    }

}