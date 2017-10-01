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
            $admins = $this->model->findAll('admin', [
                'name'=>$_POST['username'],
                'password'=>$password
            ]);
            $foremans = $this->model->findAll('foreman', [
                'name'=>$_POST['username'],
                'password'=>$password
            ]);
            foreach ($admins as $admin) {
                foreach ($foremans as $foreman) {
                    if ($password == $admin->password) {
                        Session::write('admin', $admin);
                        Session::setFlash("Vous êtes maintenant connecté");
                        $this->views->redirect(BASE_URL . '/posts/view');
                    } elseif ($password == $foreman->password) {
                        Session::write('user', $foreman);
                        Session::setFlash("Vous êtes maintenant connecté");
                        $this->views->redirect(BASE_URL . '/posts/index');
                    } else {
                        Session::setFlash("Identifiant ou mot de passe incorrect", 'danger');
                    }
                }
            }
        }
        $this->views->set($var);
    }
}
