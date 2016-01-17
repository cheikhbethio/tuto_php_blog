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
    public function update($id, $fields){
        $sql_parts =[];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[]= "$k = ?";
            $attributes[]=$v;
        }
        $attributes[] = $id;
        $sql_parts = implode(',', $sql_parts);
        return $this->query("update {$this->table} set $sql_parts where id =? ", $attributes, true);
    }
    public function create($fields){
        $sql_parts =[];
        $attributes = [];
        foreach($fields as $k => $v){
            $sql_parts[]= "$k = ?";
            $attributes[]=$v;
        }
        $sql_parts = implode(',', $sql_parts);/*
        var_dump($sql_parts);
        var_dump($attributes);
        die();**/
        return $this->query("insert into {$this->table} set $sql_parts", $attributes, true);
    }
    public function delete($id){
        return $this->query("delete from {$this->table}  where id =? ", [$id], true);
    }
    public function extractToList($key, $value){
        $records = $this->all();
        $result = [];
        foreach($records as $v){
            $result[$v->$key] = $v->$value;
        }
        return $result;
    }

}