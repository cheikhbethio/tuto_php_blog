<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */
$app =  App::getInstance();
$table = $app->getTable('Post');

if(!empty($_POST)){
    $added = $table->create([
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'categorie_id' => $_POST['categorie_id']
        ]
    );
    if($added){
        header('Location: admin.php?p=posts.edit&id='.$app->getDB()->lastInsertId());
    }
}
$categories = $app->getTable('Category')->extractToList('id', 'titre');
$form = new \Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article') ;?>
    <?= $form->input('contenu', 'Contenu', ['type'=>'textarea']); ?>
    <?= $form->select('categorie_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>


