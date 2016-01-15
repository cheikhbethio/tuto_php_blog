<?php
namespace App\Table;

use Core\Table\Table;

class CategoryTable extends Table{
    protected $table='categories';

    public function last(){
        return $this->query("
            SELECT *
            FROM " . $this->table);
    }

}