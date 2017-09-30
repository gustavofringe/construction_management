<?php

class View
{
    private $layout = 'default';
    public $vars = array();
    private $rendered = false;

    /**
     * View constructor.
     * @param null $controller
     * @param null $action
     */
   /* public function __construct()
    {
       $var = self::$var;
       return $var;
        //$this->file = ROOT . "/views/" . $controller . '/' . $action . ".php";
    }*/
    /**
     * @param array $data
     */
    /* public function render(array $data)
     {
         $content = $this->renderFile($this->file, $data);
         $view = $this->renderFile(ROOT . '/views/layouts/' . $this->layout . '.php',
             array('content' => $content));
         return $view;
     }*/
    /**
     * @param $key
     * @param null $value
     */
    public function set($key, $value=null)
    {
        $vars = $this->vars;
        if (is_array($key)) {
            $vars += $key;
            return $vars;
        } else {
            $vars[$key] = $value;
            return $vars;
        }
    }
    public function render($folder = null, $view = null)
    {
        //extract variables for views
        extract($this->vars);
        //define view
        $view = ROOT . DS . 'views' . DS . $folder . DS . $view . '.php';
        //start require view
        ob_start();
        //require view
        require($view);
        //play view
        $content = ob_get_contents();
        ob_end_clean();
        //require layouts
        require ROOT . DS . 'views' . DS . 'layouts' . DS . $this->layout . '.php';

    }



    /**
     * @param $url
     * @param null $code
     */
    function redirect($url, $code = null)
    {
        if ($code == 301) {
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: " . $url);
    }

    /**
     * @param $file
     * @param $data
     * @throws Exception
     */
    /*private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($this->vars);
            ob_start();
            require $file;
            $content = ob_get_clean();
            require_once ROOT . '/views/layouts/' . $this->layout . '.php';
        } else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }*/
}
