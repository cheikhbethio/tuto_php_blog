<?php
namespace Core\Auth;
use Core\Database\Database;

/**
 * Created by PhpStorm.
 * User: moussa
 * Date: 15/01/2016
 * Time: 19:36
 */
class DBAuth{
    private $db;
    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }
    public function login($username, $password){
        $user = $this->db->prepare(
            'select * from users where username = ?', [$username] , null, true
        );
        if($user){
            if($user->password == sha1($password));
            $_SESSION['auth'] = $user->id;
            return true;
        }
        return false;
}
    public function logged(){
        return isset($_SESSION['auth']);
    }
}