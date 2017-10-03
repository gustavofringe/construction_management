<?php

class Create extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        //define title page
        $var['title'] = "Create";
        // search categories & foreman for select view
        $var['categories'] = $this->model->findAll('categories', []);
        $var['foremans'] = $this->model->findAll('foreman', []);
        //if post
        if (!empty($_POST)) {
            //verify correctly title
            if (empty($_POST['title']) || !preg_match('/^[a-zA-Z0-9_\s]+$/', $_POST['title'])) {
                $var['errors']['title'] = "Vous n'avez pas entrer un titre valide";
            }
            //verify correctly url
            if (empty($_POST['url']) || !preg_match('/^[a-z\-0-9]+$/', $_POST['url'])) {
                $var['errors']['url'] = "Vous n'avez pas entrer un url valide";
            }
            //verify if content
            if (empty($_POST['content'])) {
                $var['errors']['content'] = "Votre contenu est incorrect";
            }
            //if no errors add project
            if (empty($var['errors'])) {
                $path = ROOT . '/public/documents';
                $file = $_FILES['file'];
                $ext = strtolower(substr($file['name'], -3));
                $auto_ext = ['pdf'];
                if (in_array($ext, $auto_ext)) {
                    //$destination = ROOT . '/public/img';
                    $upload = move_uploaded_file($file['tmp_name'], $path . DS . $file['name']);
                    if ($upload) {
                        $condition = ['name' => $file['name']];
                        $this->model->save('documents', [
                            'conditions' => $condition
                        ]);
                        $title = $_POST['title'];
                        $url = $_POST['url'];
                        $foreman_id = $_POST['foreman_id'];
                        $category_id = $_POST['category_id'];
                        $date = $_POST['date'];
                        $content = $_POST['content'];
                        $cond = ['title' => $title, 'content' => $content, 'url' => $url, 'category_id' => $category_id, 'document_id' => Model::$id, 'foreman_id' => $foreman_id, 'deadline' => $date, 'online' => 1];
                        $test = $this->model->save('works', [
                            'conditions' => $cond
                        ]);
                        $this->session->setFlash('Travail correctement enregistrer');
                        $this->views->redirect(BASE_URL.'/posts/views');
                        die();
                    } else {
                        $var['errors']['image'] = "le fichier n'est pas enregistrer";
                    }
                } else {
                    $var['errors']['image'] = "le fichier n'est pas au bon format";
                }
            }
        }
        //set variables at view
        $this->views->set($var);
    }
}
