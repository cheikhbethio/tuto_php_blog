<?php
namespace App\Tables;
use App\Database;

class Table{
    protected $table;
    protected $db;

    public function __construct(Database\Database $db){
        $this->db = $db;
        if(is_null($this->table)){
            $parst = explode('\\', get_class($this));
            $class_name = end($parst);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }
    public function all(){
        return $this->db->query('select * from articles');
    }

}