<?php
define('ROOT', dirname(__DIR__));

require ROOT. '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}
ob_start();
if($p==='home'){
    require ROOT . '/pages/admin/posts/index.php';
} elseif($p==='posts.show'){
    require ROOT . '/pages/admin/posts/show.php';
} elseif($p==='posts.category'){
    require ROOT . '/pages/admin/posts/categorie.php';
}

$content=ob_get_clean();
require '../pages/templates/default.php';

