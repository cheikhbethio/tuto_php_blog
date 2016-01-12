<?php
session_start();
require '../app/Autoloader.php';;
App\Autoloader::register();

$app= \App\App::getInstance();

var_dump($app->getTable('posts'));
var_dump($app->getTable('users'));
var_dump($app->getTable('categories'));


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
