<h1>Administrer les categories</h1>
<p>
    <a href="?p=admin.categories.add" class="btn btn-success btn-lg">Ajouter une catégorie</a>
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
        <?php foreach($categories as $categorie) :?>
            <tr>
                <td><?= $categorie->id; ?> </td>
                <td><?= $categorie->titre ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $categorie->id ?>">Editer</a>
                    <form action="?p=admin.categories.delete&id=<?= $categorie->id ?>" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $categorie->id ?>">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
