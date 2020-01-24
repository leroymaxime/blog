<?php
namespace Projet\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager {
  public function getPosts() {
    $db = $this->dbConnect();
    $req = $db->query('SELECT * FROM articles ORDER BY created_at DESC');
  
    return $req;
  }
  
  public function getPost($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute([$postId]);
    $post = $req->fetch();
  
    return $post;
  }
  
  public function deletePost($postId) {
    $db = $this->dbConnect();
    $delete = $db->prepare('DELETE FROM articles WHERE id = ?');
    $delete->execute([$postId]);
  
    return $delete;
  }

  function postPost($title, $slug, $introduction, $content)
  {
    $db = dbConnect();
    $postArticle = $db->prepare('INSERT INTO articles(title, slug, introduction, content, created_at) VALUES(?, ?, ?, ?, NOW())');
    $addArticle = $postArticle->execute(array($title, $slug, $introduction, $content));
  
    return $addArticle;
  }
}