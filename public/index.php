<?php
define('ROOT', dirname(__DIR__));

require ROOT. '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home';
}
if($p==='home'){
    $controller = new \App\Controller\PostsController();
    $controller->index();
} elseif($p==='posts.show'){
    $controller = new \App\Controller\PostsController();
    $controller->show();
} elseif($p==='posts.category'){
    $controller = new \App\Controller\PostsController();
    $controller->categories();
} elseif($p==='login'){
    $controller = new \App\Controller\UsersController();
    $controller->login();
}


