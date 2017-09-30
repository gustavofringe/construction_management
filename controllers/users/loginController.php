<?php
class Login extends Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        //print_r($view);
        echo 'loginController';
    }

    /**
     *
     */
    public function login(){
        $var['test'] = $this->model->findAll('admin',[]);
        $var['errors'] = 'test';
        //print_r($var);
        foreach ($var['test'] as $k=>$v){
            echo $v->name;
        }
        $this->views->set($var);
    }
}
