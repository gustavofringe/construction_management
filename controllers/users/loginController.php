<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login(){
$conditions = ['status'=>'r', 'name'=>'r'];
        $test = Model::findAll('admin',[
            'conditions'=>$conditions
        ]);
        print_r($test);
    }
}
