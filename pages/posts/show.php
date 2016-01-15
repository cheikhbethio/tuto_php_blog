<?php
$app =App::getInstance();
$theArticle = $app->getTable('Post')->find($_GET['id']);

if($theArticle === false){
    $app->notFound();
}

$app->title = $theArticle->titre;
?>

<h1> <?= $theArticle->titre?> </h1>

<p><em><?= $theArticle->categorie;?></em></p>

<p> <?= $theArticle->contenu ?> </p>