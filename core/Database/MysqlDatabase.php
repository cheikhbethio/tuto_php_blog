<?php

namespace Core\Database;
use \PDO;

class MysqlDatabase extends Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user='root', $db_host='localhost'){
        $this->$db_name = $db_name;
        $this->$db_user = $db_user;
        $this->$db_host = $db_host;
    }

    public function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:host=localhost;dbname=tuto_php_blog;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }
    public function query($statement, $class_name=null, $one=false){
        $req = $this->getPDO()->query($statement);
        if(strpos($statement, 'update') === 0 ||
            strpos($statement, 'insert') === 0 ||
            strpos($statement, 'delete') === 0){
            return $req;
        }
        if($class_name===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }
    public function prepare($statement, $attribute, $class_name=null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attribute);
        if(strpos($statement, 'update') === 0 ||
            strpos($statement, 'insert') === 0 ||
            strpos($statement, 'delete') === 0){
            return $res;
        }
        if($class_name===null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function lastInsertId()    {
        return $this->getPDO()->lastInsertId();
    }
}