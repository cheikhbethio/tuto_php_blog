<?php
define('ROOT', dirname(__DIR__));

require ROOT. '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'home'; //posts.index
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
} elseif($p==='admin.posts.index'){
    $controller = new \App\Controller\Admin\PostsController();
    $controller->index();
} elseif($p==='admin.posts.add'){
    $controller = new \App\Controller\Admin\PostsController();
    $controller->add();
} elseif($p==='admin.posts.edit'){
    $controller = new \App\Controller\Admin\PostsController();
    $controller->edit();
} elseif($p==='admin.posts.delete'){
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->delete();
}elseif($p==='admin.categories.home'){
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->index();
} elseif($p==='admin.categories.delete'){
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->delete();
} elseif($p==='admin.categories.add'){
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->add();
} elseif($p==='admin.categories.edit'){
    $controller = new \App\Controller\Admin\CategoriesController();
    $controller->edit();
}


