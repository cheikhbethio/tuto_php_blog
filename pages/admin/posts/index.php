<?php
$posts = App::getInstance()->getTable("Post")->all();
?>

<h1>Administrer les articles</h1>
<p>
    <a href="?p=posts.add" class="btn btn-success btn-lg">Ajouter</a>
</p>
<table class="table">
   <thead>
       <tr>
           <td>ID</td>
           <td>Titre</td>
           <td>Action</td>
       </tr>
   </thead>
    <tbody>
        <?php foreach($posts as $post) :?>
            <tr>
                <td><?= $post->id; ?> </td>
                <td><?= $post->titre ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->categorie_id ?>">Editer</a>
                    <form action="?p=posts.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button class="btn btn-danger" href="?p=posts.delete&id=<?= $post->id ?>">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
