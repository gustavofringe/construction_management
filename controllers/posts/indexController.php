<?php
class Index extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        //title page
        $var['title'] = "Projects";
        print_r($_SESSION);
        //recover id foreman
        $id = $_SESSION['user']->id;
        if(isset($_POST['categori'])) {
            $var['cat'] = $_POST['categori'];
        }
            //condition for work
            $cond = ['foreman_id' => $id, 'category_id' => $var['cat']];

            $var['works'] = $this->model->findAll('works', [
                'conditions' => $cond
            ]);
            print_r($var['works']);
            //recover categories
            $var['categories'] = $this->model->findAll('categories', []);

            print_r($_POST);

        $this->views->set($var);
    }
    public function edit($id){

    }
    public function update($id){
        $this->model->update('works','online',$id);
        $this->views->redirect(BASE_URL . '/posts/index');
        die();
    }
}
