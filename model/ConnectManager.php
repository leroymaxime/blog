<?php
namespace Projet\Blog\Model;

require_once("model/Manager.php");

class ConnectManager extends Manager {
  function connect() {
    $db = $this->dbConnect();
    $email = $_POST['email'];
    $req = $db->prepare('SELECT id, password, role FROM membres WHERE email = :email');
    $req-> execute(array(
              'email' => $_POST['email']));
    $resultat = $req->fetch();

    return $resultat;
  }
}