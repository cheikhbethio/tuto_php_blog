<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 16:25
 */

namespace App\Controller;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends  AppController{

   public function login(){
       $errors =false;
       if(!empty($_POST)){
           $auth = new DBAuth(App::getInstance()->getDB());
           if($auth->login($_POST['username'], $_POST['password'])){
               header('Location: index.php?p=admin.posts.index');
           }else{
               $errors = true;
           }
       }
       $form = new BootstrapForm();

       $this->render('users.login', compact('form', 'errors'));
   }
}