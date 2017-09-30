<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    public function home(){

        $var['test'] = $this->model->findAll('admin',[]);
        $var['errors'] = 'test';
        //print_r($var);
        foreach ($var['test'] as $k=>$v){
            echo $v->name;
        }
        $this->views->set($var);
    }
}
