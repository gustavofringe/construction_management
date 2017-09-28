<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login(){
//$conditions = ['status'=>1, 'name'=>'guillaume'];
        $test = Model::findAll('admin',[
            'conditions'=>'status'
        ]);
        print_r($test);
    }
}
