<?php
/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 19/01/2016
 * Time: 13:18
 */

namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;

class CategoriesController extends  AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function atHome(){
        header('Location: index.php?p=admin.categories.home');
    }

    public function index(){
        $categories = $this->Category->all();
        $this->render('admin.categorie.index', compact('categories'));
    }
    public function add(){

        if(!empty($_POST)){
            $added = $this->Category->create(['titre' => $_POST['titre']]);
            if($added){
                return $this->atHome();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categorie.addEdit', compact('categories', 'form'));
    }
    public function edit(){
        $id = $_GET['id'];
        $category = $this->Category->find($id);
        if($category === false){
            $this->notFound();
        }

        if(!empty($_POST)){
            $edited = $this->Category->update( $id, [
                    'titre' => $_POST['titre']
                ]
            );
            if($edited){
                return $this->atHome();
            }
        }
        $form = new BootstrapForm($category);
        $this->render('admin.categorie.addEdit', compact('categories', 'form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $added = $this->Category->delete($_POST['id']);
            if($added){
                return $this->atHome();
            }
        }
    }

}