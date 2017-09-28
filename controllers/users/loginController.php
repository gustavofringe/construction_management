<?php
class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login(){
$test = 'det';
$test2 = 'on';
$test3 = 'ateur';
$test4 = 'acteur';
        $test = Model::find([],'post',[
            'aaa'=>$test,
            'zzz' =>$test2,
            'prout' =>$test3,
            'proutprout'=>$test4,
            'taslim'=>'taslim'
        ]);
        debug($test);
    }
}
