<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */

if(!empty($_POST)){
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDB());
    if($auth->login($_POST['username'], $_POST['password'])){
        header('Location: admin.php');
    }else{
        ?>
        <div class="alert alert-danger">
            identifiants incorrects ou inexexistants
        </div>
        <?php
    }
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>
<form method="post">
    <?= $form->input('username', 'Pseudo') ?>
    <?= $form->input('password', 'Mot de pass', ['type'=>'password']) ?>
    <button class="btn btn-primary">Envoyer</button>
</form>


