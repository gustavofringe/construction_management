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
            if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_\s]+$/', $_POST['title'])) {
                $var['errors']['title'] = "Vous n'avez pas entrer un titre valide";
            }
            if (empty($_POST['url']) || !preg_match('/^[a-z\-0-9]+$/', $_POST['url'])) {
                $var['errors']['url'] = "Vous n'avez pas entrer un url valide";
            }
            if(empty($_POST['content'])){
                $var['errors']['content'] = "Votre contenu est incorrect";
            }
            if(empty($var['errors'])){
                $file = $_FILES['file'];
                $ext = strtolower(substr($file['name'], -3));
                $auto_ext = ['pdf'];
                if(in_array($ext, $auto_ext)){
                    //chmod(ROOT."/public/img/", 777);
                    move_uploaded_file($file['tmp_name'], ROOT.'/public/img/'.$file['name']);
                    $condition = ['name'=>$file['name']];
                    $this->model->save('documents',[
                        'conditions'=>$condition
                    ]);
                    $title = $_POST['title'];
                    $url = $_POST['url'];
                    $foreman = $_POST['foreman_id'];
                    $category = $_POST['category_id'];
                    $date = $_POST['date'];
                    $content = $_POST['content'];
                    $cond = ['title'=>$title,'content'=>$content,'url'=>$url,'category_id'=>$category, 'document_id'=>Model::$id, 'foreman_id'=>$foreman,'deadline'=>$date, 'online'=>1];
                    $test = $this->model->save('works',[
                        'conditions'=> $cond
                    ]);
                    print_r($test);
                }else{
                    $var['errors']['image'] = "le fichier n'est pas au bon format";
                }
            }
        }
        $this->views->set($var);
    }
}
