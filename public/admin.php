<?php
define('ROOT', dirname(__DIR__));

require ROOT. '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}
//auth
$app =App::getInstance();
$auth = new \Core\Auth\DBAuth($app->getDB());
if(!$auth->logged()){
    $app->forbiden();
}
ob_start();
if($p==='home'){
    require ROOT . '/Views/admin/posts/index.php';
} elseif($p==='posts.delete'){
    require ROOT . '/Views/admin/posts/delete.php';
} elseif($p==='posts.add'){
    require ROOT . '/Views/admin/posts/add.php';
} elseif($p==='posts.edit'){
    require ROOT . '/Views/admin/posts/edit.php';
}elseif($p==='categories.home'){
    require ROOT . '/Views/admin/categorie/index.php';
} elseif($p==='categories.delete'){
    require ROOT . '/Views/admin/categorie/delete.php';
} elseif($p==='categories.add'){
    require ROOT . '/Views/admin/categorie/add.php';
} elseif($p==='categories.edit'){
    require ROOT . '/Views/admin/categorie/edit.php';
}

$content=ob_get_clean();
require '../Views/templates/default.php';

