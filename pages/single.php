<?php
$theArticle = $db->prepare('select * from articles where id=?', [$_GET['id']], '\App\Tables\Article', true);
?>

<h1> <?= $theArticle->titre ?> </h1>
<p> <?= $theArticle->contenu ?> </p>