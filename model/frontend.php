<?php

function getUsers() {
  $db = dbConnect();
  $req = $db->query('SELECT * FROM users ORDER BY id ASC');

  return $req; 
}

function getUser($userId) {
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM users WHERE id = ?');
  $req->execute([$userId]);
  $user = $req->fetch();

  return $user;
}

function getPosts() {
  $db = dbConnect();
  $req = $db->query('SELECT * FROM articles ORDER BY created_at DESC');

  return $req;
}

function idExist($postId) {
  $db = dbConnect();
  $verifId = $db->prepare("SELECT * FROM articles WHERE id = ?");
  $verifId->execute(array($postId));
  $idExist = $verifId->rowcount();

  return $idExist;
}

function getPost($postId) {
  $db = dbConnect();
  $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
  $req->execute([$postId]);
  $post = $req->fetch();

  return $post;
}

function deletePost($postId) {
  $db = dbConnect();
  $delete = $db->prepare('DELETE FROM articles WHERE id = ?');
  $delete->execute([$postId]);

  return $delete;
}

function getComments($postId) {
  $db = dbConnect();
  $comments = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY created_at DESC');
  $comments->execute([$postId]);

  return $comments;
}

function postComment($postId, $pseudo, $comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(article_id, pseudo, content, created_at) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $pseudo, $comment));

    return $affectedLines;
}
function dbConnect() {

  $db = new PDO('mysql:host=localhost;dbname=portfolio_blog;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

  return $db;
}