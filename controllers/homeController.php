<?php
class Home extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    public function home(){
        $var['title'] = 'Se connecter';
        if(isset($_POST['password'])) {
            $password = $this->service->hashPass($_POST['password']);
            $admin = $this->model->findFirst('admin', [
                'name'=>$_POST['username'],
                'password'=>$password
            ]);
            $foreman = $this->model->findFirst('foreman', [
                'name'=>$_POST['username'],
                'password'=>$password
            ]);
            if($password == $admin->password){
                Session::write('user',$admin);
                Session::setFlash("Vous êtes maintenant connecté");
                $this->views->redirect(BASE_URL.'/posts/view');
            }elseif($password == $foreman->password){
                Session::write('admin',$admin);
                Session::setFlash("Vous êtes maintenant connecté");
                $this->views->redirect(BASE_URL.'/posts/index');
            }else{
                Session::setFlash("Identifiant ou mot de passe incorrect",'danger');
            }
        }
        $this->views->set($var);
    }
}
