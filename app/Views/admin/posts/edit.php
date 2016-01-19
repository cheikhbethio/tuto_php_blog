<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */

$id = $_GET['id'];
$app =  App::getInstance();
$table = $app->getTable('Post');
$post = $table->find($id);
if($post === false){
    $app->notFound();
}

if(!empty($_POST)){
    $updatred = $table->update( $id, [
            'titre' => $_POST['titre'],
            'contenu' => $_POST['contenu'],
            'categorie_id' => $_POST['categorie_id']
        ]
    );
    if($updatred){
        ?>
        <div class="alert alert-success">La mise a jour a été traité avec succes!!</div>
        <?php
    }
}
$categories = $app->getTable('Category')->extractToList('id', 'titre');
$form = new \Core\HTML\BootstrapForm($post);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article') ;?>
    <?= $form->input('contenu', 'Contenu', ['type'=>'textarea']); ?>
    <?= $form->select('categorie_id', 'Categorie', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>


