<?php
class Errors extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view = new View('errors', '404');
    }
    public function index(){
        $this->view->render(['404']);
        die();
    }
}