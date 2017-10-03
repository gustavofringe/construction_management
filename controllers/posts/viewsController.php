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
        $var['foremans'] = $this->model->findAll('foreman',[]);
        $this->views->set($var);
    }
    public function delete($id){
        $condition = ['id'=>$id];
        $document_id = $this->model->findAll('works',[
            'conditions'=>$condition
        ]);
        foreach ($document_id as $docu){
            $cond = ['id'=>$docu->document_id];
            $doc = $this->model->findFirst('documents',[
                'conditions'=>'id='.$docu->document_id
            ]);
            unlink(BASE_URL.'/public/documents/'.$doc->name);
            $this->model->delete('documents',[
                'conditions'=>$cond
            ]);
        }
        //die();
        $this->model->delete('works',$id);

        $this->views->redirect(BASE_URL.'/posts/views');
        $this->session->setFlash('travail supprimé','danger');
    }
}
