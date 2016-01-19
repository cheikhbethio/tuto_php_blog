<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:18
 */

namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;

class PostsController extends  AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }
    public function add(){
        if(!empty($_POST)){
            $added = $this->Post->create([
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'categorie_id' => $_POST['categorie_id']
                ]
            );
            if($added){
               return $this->index();
            }
        }
        $categories = $this->Category->extractToList('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.addEdit', compact('categories', 'form'));
    }
    public function edit(){
        $id = $_GET['id'];
        $post = $this->Post->find($id);
        if($post === false){
            $this->notFound();
        }
        if(!empty($_POST)){
            $updated = $this->Post->update( $id, [
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'categorie_id' => $_POST['categorie_id']
                ]
            );
            if($updated){
                return $this->index();
            }
        }
        $categories =$this->Category->extractToList('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.addEdit', compact('categories', 'form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $added = $this->Post->delete($_POST['id']);
            if($added){
                return $this->index();
            }
        }

    }

}