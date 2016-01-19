<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:31
 */

namespace App\Controller;
use Core\Controller\Controller;

class AppController extends Controller{
    protected $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($loadModel){
        $this->$loadModel = \App::getInstance()->getTable($loadModel);
    }

}