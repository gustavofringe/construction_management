<?php

class Model
{
    static $connections = [];
    public $conf = 'default';
    static $db;
    public $id = 'id';
    public $pdo;

    /**
     * database connection
     * Model constructor.
     */
    public function __construct($db = null)
    {
        echo 'model ';
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
            Model::$connections[$this->conf] = $pdo;
            Model::$db = $pdo;
            //return Model::$db;
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
    public static function findAll($table,array $req){
        echo ' Model::FindAll ';
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
        if(isset($req['join'])){
            foreach($req['join'] as $k=>$v){
                $sql .= 'LEFT JOIN '.$k.' ON '.$v.' ';
            }
        }
        if(isset($req['conditions'])){
            $sql .= ' WHERE ';
            if(!is_array($req['conditions'])){
                $sql .= $req['conditions'];
            }else{
                $cond =[];
                foreach($req['conditions'] as $k=>$v){
                    if(!is_numeric($v)){
                        $v="'".$v."'";
                    }
                    $cond[] = $k."=". $v;
                }
                $sql .= implode(' , ', $cond);
            }
        }
        if(isset($req['limit'])){
            $sql .= 'LIMIT '.$req['limit'];
        }
        if(isset($req['order'])){
            $sql .= ' ORDER BY '.$req['order'];
        }

        //return $sql;
        //print_r(Model::$db);
        $pre = Model::$db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll();
    }

    /**
     *find the first request
     * @param $req
     * @return mixed
     */
    public function findFirst($table,$req){
        return current(Model::findAll($table,$req));
    }

    /**
     * delete by id
     * @param $id
     */
    public function delete($table, $id){
        $sql = "DELETE FROM {$table} WHERE {$this->id} = $id";
        Model::$db->query($sql);
    }
}
