<?php
namespace Projet\Blog\Model;
require_once("model/Manager.php");

class CommentManager extends Manager {

  public function getComments($postId) {
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT * FROM comments WHERE article_id = ? ORDER BY created_at DESC');
    $comments->execute([$postId]);
  
    return $comments;
  }
  
  public function listComments() {
    $db = $this->dbConnect();
    $listComments = $db->prepare('SELECT * FROM comments WHERE id ORDER BY created_at DESC');
    $listComments->execute();
  
    return $listComments;
  }

  public function getcomment($postId) {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT * FROM comments WHERE id = ?');
    $req->execute([$postId]);
    $post = $req->fetch();
  
    return $post;
  }

  public function postComment($postId, $pseudo, $comment)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments(article_id, pseudo, content, created_at) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $pseudo, $comment));
  
    return $affectedLines;
  }

  public function updateComment($content)
  {
    $db = $this->dbConnect();
    $updateComment = $db->prepare('UPDATE comments SET content = :content WHERE id = :id');
    $affectedLines = $updateComment->execute(array(
      'content' => $_POST['content'],
      'id' => $_GET['id']));
  
    return $affectedLines;
  }
}