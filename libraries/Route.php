<?php

class Route
{
    private $url = false;
    private $controller;
    public $views;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->views = new View();
        $this->getUrl();
        if (empty($this->url[0])) {
            $this->loadControllerDefault();
        } elseif(!empty($this->url[0])&& !empty($this->url[1])) {
            $this->loadController();
            $this->views->render($this->url[0], $this->url[1]);
        }else{
            $this->errors();
            die();
        }
    }

    /**
     *cut the url
     */
    private function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "'");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->url = explode("/", $url);
    }

    /**
     *
     */
    private function loadControllerDefault()
    {
        require_once ROOT . '/controllers/homeController.php';
        $this->controller = new Home();
        $this->controller->home();
        $this->views->render('pages', 'home');
    }

    /**
     *
     */
    private function loadController()
    {
        $page = ROOT . '/controllers/' . $this->url[0] . '/' . $this->url[1] . 'Controller.php';

        if (file_exists($page)) {
            require $page;
            //$this->loadModel($this->url[1]);
            //$this->controller = new $this->url[1];
            //$this->controller->{$this->url[1]}();
            $this->methodExist();
        } else {
            $this->errors();
            die();
        }

    }

    /**
     *
     */
    private function methodExist()
    {
        $length = count($this->url);
        $this->controller = new $this->url[1];
        if ($length > 2) {
            if (!method_exists($this->controller, $this->url[2])) {
                $this->errors();
                die();
            }
        }
        switch ($length) {
            case 6:
                //$controller->method(param1, param2,param3)
                $this->controller->{$this->url[2]}($this->url[3], $this->url[4], $this->url[5]);
                break;
            case 5:
                //$controller->method(param1, param2)
                $this->controller->{$this->url[2]}($this->url[3], $this->url[4]);
                break;
            case 4:
                //$controller->method(param1)
                $this->controller->{$this->url[2]}($this->url[3]);
                break;
            case 3:
                //$controller->method(param1)
                $this->controller->{$this->url[2]}();
                break;
            case 2:
                //$controller->method()
                $this->controller->{$this->url[1]}();
                break;
            case 1:
                $this->controller->index();
                break;
            default:
                $this->errors();
                break;
        }
    }

    /**
     * @param $name
     */
    private function loadModel($name)
    {
        $path = ROOT . '/model/' . $this->url[0] . '/' . $name . 'Model.php';
        if (file_exists($path)) {
            require ROOT . '/model/' . $this->url[0] . '/' . $name . 'Model.php';
            $modelName = $name . 'Model';
            $this->model = new $modelName();
        }
    }

    /**
     *
     */
    private function errors()
    {
        require ROOT . '/controllers/errorsController.php';
        $this->controller = new Errors();
        $this->controller->index();
        die();
    }
}
