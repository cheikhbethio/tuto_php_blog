<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:31
 */

namespace App\Controller\Admin;
use Core\Auth\DBAuth;
use \App;

class AppController extends App\Controller\AppController{
    public function __construct(){
        parent::__construct();
        //auth
        $app =App::getInstance();
        $auth = new DBAuth($app->getDB());
        if(!$auth->logged()){
            $this->forbiden();
        }
    }

}