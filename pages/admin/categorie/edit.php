<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */

$id = $_GET['id'];
$app =  App::getInstance();
$table = $app->getTable('Category');
$category = $table->find($id);
if($category === false){
    $app->notFound();
}

if(!empty($_POST)){
    $updatred = $table->update( $id, [
            'titre' => $_POST['titre']
        ]
    );
    if($updatred){
        ?>
        <div class="alert alert-success">La mise a jour a été traitée avec succes!!</div>
        <?php
    }
}
$form = new \Core\HTML\BootstrapForm($category);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de l\'article') ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>


