<?php



function verifEmail() {
  $verifMail = $db->prepare("SELECT * FROM membres WHERE email = ?");
  $verifMail->execute(array($email));
  $mailExist = $verifMail->rowcount();

  return $mailExist;
}

function dbConnect() {

  $db = new PDO('mysql:host=localhost;dbname=portfolio_blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

  return $db;
}