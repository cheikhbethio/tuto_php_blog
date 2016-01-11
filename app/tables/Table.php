<?php
namespace App\Tables;
use App\App;

 class Table{

     protected static $table;

     public static function query($statement, $attributes = null, $one=false){
         if($attributes){
             return App::getDB()->prepare($statement, $attributes, get_called_class(), $one);
         }else{
             return App::getDB()->query($statement, get_called_class(), $one);
         }
     }
     public static function find($id){
         return static::query("
                select * from ".static::getTable()." where id=?
        ", [$id], true);
     }
     private static function getTable(){
         if(static::$table === null){
             $class_name = explode('\\', get_called_class());
             static::$table = strtolower(end($class_name)).'s';
         }
         return static::$table;
     }
     public static function all(){
         return App::getDB()->query("select * from ".static::getTable()."", get_called_class());
     }

     public function __get($key){
         $method ='get'.ucfirst($key);
         $this->$key = $this->$method();
         return $this->$key;
     }


 }