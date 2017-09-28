<?php

class Model
{
    public $pdo;
    public $conf = 'default';
    public $confdb;

    public function __construct()
    {
        try {
            $this->confdb = Conf::$database[$this->conf];
            $this->pdo = new PDO(
                'mysql:host=' . $this->confdb['host'] . ';dbname=' . $this->confdb['database'] . ';',
                $this->confdb['login'],
                $this->confdb['password']
            );
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de donnée';
            echo $e->getMessage();
            die();
        }
    }
}
