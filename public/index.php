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
    require ROOT . '/pages/posts/home.php';
} elseif($p==='posts.show'){
    require ROOT . '/pages/posts/show.php';
} elseif($p==='posts.category'){
    require ROOT . '/pages/posts/categorie.php';
}

$content=ob_get_clean();
require '../pages/templates/default.php';


/*
if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p = 'home';
}

//initialisation de la DB

ob_start();

if ($p === 'home'){
    require '../pages/home.php';
}elseif($p == 'article'){
    require '../pages/single.php';
}elseif($p == 'categorie'){
    require '../pages/categorie.php';
}elseif($p == '404'){
    echo "page introuvable!!";
}

$content=ob_get_clean();
require '../pages/templates/default.php';
*/
