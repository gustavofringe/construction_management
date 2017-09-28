<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    public function home(){
        //$this->loadView('home');
        $view = new View('pages', 'home');
        $view->render(['home']);
    }
}
