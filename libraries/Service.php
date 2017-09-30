<?php
class Service{
    public function hashPass($pass){
        if(isset($pass)){
            $passHash = sha1($pass);
            return $passHash;
        }
    }
    public function checkPassword($password, $passuser, $user){
        if($password == $passuser){
            Session::write('user',$user);
            Session::setFlash("Vous êtes maintenant connecté");

        }else{
            Session::setFlash("Identifiant ou mot de passe incorrect",'danger');
        }
    }
}
