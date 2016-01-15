<?php
namespace Core\Table;
use Core\Database\Database;

class Table{
    protected $table;
    protected $db;

    public function query($statement, $attributes = null, $one=false){
        if($attributes){
            $class_name = str_replace('Table', 'Entity', get_class($this));
            return $this->db->prepare($statement, $attributes, $class_name, $one);
        }else{
            $class_name = str_replace('Table', 'Entity', get_class($this));
            return $this->db->query($statement,$class_name, $one);
        }
    }
    public function __construct(Database $db){
        $this->db = $db;
        if(is_null($this->table)){
            $parst = explode('\\', get_class($this));
            $class_name = end($parst);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }
    public function all(){
       /* return $this->db->query('select * from '.$this->table);*/
        return $this->query("
            SELECT *
            FROM " . $this->table);
    }

    public function find($id){
        return $this->query("select * from {$this->table} where id =? ", [$id], true);
    }

}