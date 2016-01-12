<?php
namespace App\Tables;
class Table{
    protected $table;

    public function __construct(){
        if(is_null($this->table)){
            $parst = explode('\\', get_class($this));
            $class_name = end($parst);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

}