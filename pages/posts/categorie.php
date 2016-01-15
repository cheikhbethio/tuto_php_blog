<?php
$id = $_GET['id'];
$app =  App::getInstance();

$cat = $app->getTable('Category')->find($id);
if($cat === false){
    $app->notFound();
}
$articles = $app->getTable('Post')->lastByCatégirie($id);
$categories = $app->getTable('Category')->all();

/*echo 'last categorie ';
var_dump(App::getInstance()->getTable('Category')->last());echo 'all categorie';
var_dump($categories);echo 'last article by categorie';
var_dump($articles);*/

?>

<h2><?= $cat->titre ?></h2>

<div class="row">
    <div class="col-sm-8">
        <?php foreach($articles as $post) : ?>

            <h2>
                <a href="<?= $post->url ?>"><?= $post->titre;?></a>
            </h2>
            <p><em><?=$post->categorie?></em></p>
            <p>
                <?= $post->extrait; ?>
            </p>
        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach($categories as $categorie): ?>
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
