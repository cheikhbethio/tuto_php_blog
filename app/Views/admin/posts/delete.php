<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 16/01/2016
 * Time: 12:56
 */
$app =  App::getInstance();
$table = $app->getTable('Post');

if(!empty($_POST)){
    $added = $table->delete($_POST['id']);
    if($added){
        header('Location: admin.php');
    }
}
?>


