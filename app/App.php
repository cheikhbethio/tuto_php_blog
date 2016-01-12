<?php
namespace App;
class App{
    private static $_instance;
    private $db_instance;
    public $title;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getTable($name){
        $class_name = 'App\\Tables\\'. ucfirst($name).'Table';
        return new $class_name();
    }

    public function getDB(){
        $config = Config::getInstance();
        if(is_null($this->db_instance)){
            $this->db_instance = new Database($config->get('db_name'),$config->get('db_user'),$config->get('db_host'));
        }
        return $this->db_instance;
    }

    /*const DR_NAME ='tuto_php_blog';
    const DR_USER ='root';
    const DR_PASS ='';
    const DR_HOST ='localhost';

    private static $database;
    private static $titre = "TutoBlog" ;

    public static function getTitre(){
        return self::$titre;
    }

    public static function setTitre($titre){
        self::$titre = $titre.' | '.self::$titre;
    }

    public static function getDB(){
        if(self::$database === null){
            self::$database = new Database(self::DR_NAME, self::DR_USER, self::DR_HOST);
        }
        return self::$database;
    }
    public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?p=404');
    }*/
}