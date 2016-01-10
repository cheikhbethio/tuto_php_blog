<?php
require '../app/Autoloader.php';;
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p = 'home';
}

//initialisation de la DB
$db = new \App\Database('tuto_php_blog');

ob_start();

if ($p === 'home'){
    require '../pages/home.php';
}elseif($p == 'article'){
    require '../pages/single.php';
}

$content=ob_get_clean();
require '../pages/templates/default.php';

