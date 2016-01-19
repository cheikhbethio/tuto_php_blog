<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:16
 */

namespace Core\Controller;


class Controller{
    protected $viewPath;
    protected $template;


    public function render($view, $variables = []){
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.','/', $view). '.php');
        $content =ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }
    protected  function notFound(){
        header("HTTP/1.0 404 Not Found");
        die('Page introuvable');
    }
    protected  function forbiden(){
        header("HTTP/1.0 403 forbiden");
        die('Acces interdit');
    }

}