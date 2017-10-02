<?php
class Views extends Controller{

    public function __construct()
    {
        parent::__construct();
    }
    public function views(){
        $var['title'] = "Project";
        if(isset($_POST['categori'])) {
            $var['cat'] = $_POST['categori'];
        }
        $var['categories'] = $this->model->findAll('categories', []);

        $var['works'] = $this->model->findAll('works',[]);
        $this->views->set($var);
    }
    public function create(){

    }
}
