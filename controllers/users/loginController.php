<?php
class Login extends Controller
{
    public $view;
    public $test;
    public $errors;
    public function __construct()
    {
        parent::__construct();

        $this->view = new View('users','login');
    }
    public function login(){
        $conditions = ['name'=>'franck'];
        $test = Model::findFirst('admin',[
            'conditions'=>$conditions
        ]);
        echo $test->name;

        $error = "test";
        $this->set($test);
        $this->set($error);
        //$this->view->render(['login'],$errors);
    }
}
