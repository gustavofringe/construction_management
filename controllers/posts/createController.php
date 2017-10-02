<?php
class Create extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function create(){
        $var['title'] = "Create";
        $var['categories'] = $this->model->findAll('categories',[]);
        $var['foremans'] = $this->model->findAll('foreman',[]);

        if(!empty($_POST)){
            if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['title'])) {
                $var['errors']['title'] = "Vous n'avez pas entrer un titre valide";
            }
            if (empty($_POST['url']) || !preg_match('/^[a-z\-0-9]+$/', $_POST['url'])) {
                $var['errors']['url'] = "Vous n'avez pas entrer un url valide";
            }
            if(empty($_POST['content'])){
                $var['errors']['content'] = "Votre contenu est incorrect";
            }
            if(empty($var['errors'])){
                $title = $_POST['title'];
                $url = $_POST['url'];
                $foreman = $_POST['foreman'];
                $category = $_POST['category'];
                $date = $_POST['date'];
                $content = $_POST['content'];
                $cond = ['name'=>$title,'url'=>$url,'content'=>$content,'category_id'=>$category,'foreman_id'=>$foreman,'deadline'=>$date];
                $this->model->save('works',[
                    'conditions'=> $cond
                ]);
                print_r($cond);
            }
        }
        $this->views->set($var);
    }
}
