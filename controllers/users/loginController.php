<?php
class Login extends Controller
{
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function login(){
        $var['title'] = 'Se connecter';
        $var['test'] = $this->model->findAll('admin',[]);
        $var['errors'] = 'test';
        $this->views->set($var);
    }
}
