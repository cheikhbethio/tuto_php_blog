<?php
session_start();
require '../app/Autoloader.php';;
App\Autoloader::register();

$app = \App\App::getInstance();
$app->title = "titre de test";

$config = \App\Config::getInstance()->get('db_user');
var_dump($app);


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
