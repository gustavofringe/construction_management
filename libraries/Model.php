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
    /**
     * @param $table
     * @param array $cond
     * @return bool|string
     */
    public function find(array $select,$table, array $cond){
        $sql = 'SELECT ';
        if(isset($select) && !empty($select)){
            foreach ($select as $selected) {
                $sql .= $selected . ' ,';
            }
            $sql = substr($sql,0,-1);
        }else{
            $sql .= '*';
        }
            $sql .=' FROM '.$table;
        if(isset($cond) && !empty($cond)) {
            $sql .= ' WHERE ';
            foreach ($cond as $k=>$v){
                $sql .= $k. ' = ' .$v.' ,';
            }
        }
        $sql = substr($sql,0,-1);
        //$sql = mysqli_real_escape_string($pdo,$sql);
        return $sql;
    }
}
