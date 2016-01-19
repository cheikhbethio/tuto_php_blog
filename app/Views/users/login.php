<?php if($errors) : ?>
        <div class="alert alert-danger">
            identifiants incorrects ou inexexistants
        </div>
<?php endif;?>

<form method="post">
    <?= $form->input('username', 'Pseudo') ?>
    <?= $form->input('password', 'Mot de pass', ['type'=>'password']) ?>
    <button class="btn btn-primary">Envoyer</button>
</form>


