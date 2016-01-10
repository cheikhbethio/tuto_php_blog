<?php foreach($db->query('select * from articles', '\App\Tables\Article') as $post) : ?>

        <h2>
            <a href="<?= $post->url ?>"><?= $post->titre;?></a>
        </h2>
        <p>
            </p> <?= $post->extrait; ?>
         </p>
<?php endforeach; ?>