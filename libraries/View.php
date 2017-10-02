<?php

class View
{
    private $layout = 'default';
    public $vars = array();
    static $var = [];
    /**
     * send variable at view
     * @param $key
     * @param null $value
     */
    public function set($key, $value=null)
    {
        $vars = $this->vars;
        if (is_array($key)) {
            $vars += $key;
            View::$var = $vars;
        } else {
            $vars[$key] = $value;
            View::$var = $vars;
        }
    }
    /**
     * render view
     * @param null $folder
     * @param null $view
     */
    public function render($folder = null, $view = null)
    {
        //extract variables for views
        extract(View::$var);
        //define views.php
        $view = ROOT . DS . 'views' . DS . $folder . DS . $view . '.php';
        //start require views.php
        ob_start();
        //require views.php
        require($view);
        //play views.php
        $content = ob_get_contents();
        ob_end_clean();
        //require layouts
        require ROOT . DS . 'views' . DS . 'layouts' . DS . $this->layout . '.php';
    }
    /**
     * redirect view
     * @param $url
     * @param null $code
     */
    public static function redirect($url, $code = null)
    {
        if ($code == 301) {
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: " . $url);
    }
}
