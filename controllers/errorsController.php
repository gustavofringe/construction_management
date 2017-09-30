<?php
class Errors extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }
    public function index(){
        $this->view->render('errors', '404');
        die();
    }
}