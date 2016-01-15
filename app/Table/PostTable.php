<?php
namespace App\Table;

use \Core\Table\Table;

class PostTable extends Table{
    protected $table = 'articles';
    /**
     * recupere les dernier articles
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN  categories ON categorie_id = categories.id
            ORDER BY articles.date DESC");
    }
    /**
     * recupère un articles en liant la catégorie associée
     */
    public function find($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN  categories ON categorie_id = categories.id
            WHERE articles.id = ?" , [$id], true);
    }

    /**
     * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
     */
    public function lastByCatégirie($id){
        return $this->query("
            select articles.id, articles.titre, articles.contenu, categories.titre as categorie
            from articles
            LEFT JOIN categories
              ON categorie_id = categories.id
              WHERE  categorie_id = ?
              ORDER BY articles.date DESC
            ",[$id]);
    }
}