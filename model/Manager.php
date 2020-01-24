<?php 
namespace Projet\Blog\Model;

class Manager {
  protected function dbConnect() {

    $db = new \PDO('mysql:host=localhost;dbname=portfolio_blog;charset=utf8', 'root', '', [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
      ]);
  
    return $db;
  }
}