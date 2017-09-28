<?php

class Model
{
    static $connections = [];
    public $conf = 'default';
    public $db;
    public $id = 'id';

    /**
     * database connection
     * Model constructor.
     */
    public function __construct()
    {
            $conf = Conf::$databases[$this->conf];
        try {
            $pdo = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';',
                $conf['login'],
                $conf['password'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $this->db = $pdo;
            return $this->db;
        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de donnée';
            echo $e->getMessage();
            die();
        }
    }

    /**
     * find all in table
     * @param array $req
     * @return array
     */
    public function findAll($table,array $req){
        $sql = 'SELECT ';
        if(isset($req['fields'])){
            if(is_array($req['fields'])){
                $sql .= implode(', ', $req['fields']);
            }else{
                $sql .= $req['fields'];
            }
        }else{
            $sql .='*';
        }
        $sql .= ' FROM ' . $table;
        if(isset($req['conditions'])){
            $sql .= ' WHERE ';
            if(!is_array($req['conditions'])){
                $sql .= $req['conditions'];
            }else{
                $cond =[];
                foreach($req['conditions'] as $k=>$v){
                    if(!is_numeric($v)){
                        $v = mysqli_real_escape_string($this->db, $v);
                    }
                    $cond[] = "$k=$v";
                }
                $sql .= implode(' AND ', $cond);
            }
        }
        if(isset($req['limit'])){
            $sql .= 'LIMIT '.$req['limit'];
        }
        return $sql;
        /*$pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);*/
    }

    /**
     *find the first request
     * @param $req
     * @return mixed
     */
    public function findFirst($req){
        return current($this->findAll($req));
    }

    /**
     * delete by id
     * @param $id
     */
    public function delete($table, $id){
        $sql = "DELETE FROM {$table} WHERE {$this->id} = $id";
        $this->db->query($sql);
    }
}
