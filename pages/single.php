<?php
use App\App;
use \App\Tables\Article;
use App\Tables\Categorie;

$theArticle =  Article::find($_GET['id']);
if($theArticle === false){
    App::notFound();
}
/*$categorie = Categorie::find($theArticle->categorie_id);*/

App::setTitre($theArticle->titre)
?>

<h1> <?= $theArticle->titre ?> </h1>

<p><em><?= $theArticle->categorie;?></em></p>

<p> <?= $theArticle->contenu ?> </p>