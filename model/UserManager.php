<?php
namespace Projet\Blog\Model;
require_once("model/Manager.php");

class UserManager extends Manager {
  public function getUsers() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT * FROM users ORDER BY id ASC');
  
    return $req; 
  }
  
  public function getUser($userId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$userId]);
    $user = $req->fetch();
  
    return $user;
  }
  
  public function deleteUser($userId) {
    $db = $this->dbConnect();
    $deleteUser = $db->prepare('DELETE FROM users WHERE id = ?');
    $deleteUser->execute([$userId]);
  
    return $deleteUser;
  }
}