<?php
namespace App\Tables;
use App\App;

class  Article extends Table{

    protected static $table = 'articles';

    public static function find($id){
        return self::query("
            select articles.id, articles.titre, articles.contenu, categories.titre as categorie
            from articles
            LEFT JOIN categories ON categorie_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);
    }
  public static function lastByCatégirie($id){
      return self::query("
            select articles.id, articles.titre, articles.contenu, categories.titre as categorie
            from articles
            LEFT JOIN categories
              ON categorie_id = categories.id
              WHERE  categorie_id = ?
              ORDER BY articles.date DESC
            ",[$id]);
  }
    public static function getLast(){
        return self::query("
            select articles.id, articles.titre, articles.contenu, categories.titre as categorie
            from articles
            LEFT JOIN categories ON categorie_id = categories.id
            ORDER BY articles.date DESC
            ");
    }

    public function getUrl(){
        return 'index.php?p=article&id='.$this->id;
    }
    public function getExtrait(){
        $html = '<p>'.substr($this->contenu, 0, 200). '...</p>';
        $html.= '<p><a href="'. $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }


}