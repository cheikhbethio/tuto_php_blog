<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:18
 */

namespace App\Controller;
use App\Controller\AppController;

class PostsController extends  AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
       $this->render('posts.index', compact('posts', 'categories'));

    }
    public function categories(){
        $id = $_GET['id'];
        $cat = $this->Category->find($id);
        if($cat === false){
           $this->notFound();
        }
        $articles =  $this->Post->lastByCatégirie($id);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('cat', 'categories', 'articles'));
    }
    public function show(){
        $theArticle = $this->Post->find($_GET['id']);
        if($theArticle === false){
            $this->notFound();
        }
        \App::getInstance()->title = $theArticle->titre;

        $this->render('posts.show', compact('theArticle'));
    }
}