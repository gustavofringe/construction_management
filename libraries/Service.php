<?php
class Service{
    public function checkPassword($passConf, $pass){
        if (empty($pass) || ($pass != $passConf)) {
            $errors = "Vous devez rentrer le même mot de passe ";
            return $errors;
        }
    }
}
