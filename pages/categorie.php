<?php
use App\Tables\Categorie;
use App\Tables\Article;
use App\App;

$id = $_GET['id'];
$categorie = Categorie::find($id);
$articles = Article::lastByCatégirie($id);
$categories = Categorie::all();

if($categorie === false){
    App::notFound();
}
?>

<h2><?= $categorie->titre ?></h2>

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
