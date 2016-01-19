<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */
$app =  App::getInstance();

if(!empty($_POST)){
    $added = App::getInstance()->getTable('Category')->create(['titre' => $_POST['titre']]);
    if($added){
        header('Location: admin.php?p=categories.home');
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('titre', 'Titre de la categorie') ;?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>


