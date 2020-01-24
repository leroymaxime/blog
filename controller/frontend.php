<?php

require_once('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts() {
  $postManager = new \Projet\Blog\Model\PostManager(); // Création d'un objet
  $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
  
  require('view/frontend/listPostsView.php');
}

function post() {
  $postManager = new \Projet\Blog\Model\PostManager();
  $commentManager = new \Projet\Blog\Model\CommentManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function postExist() {
  $postManager = new \Projet\Blog\Model\PostManager();

  $idExist = $postManager->idExist($_GET['id']);
}

function comment() {
  $commentManager = new \Projet\Blog\Model\CommentManager();
  $comment = $commentManager->getComment($_GET['id']);

  require('view/frontend/updateCommentView.php');
}

function addComment($postId, $pseudo, $comment)
{
  $commentManager = new \Projet\Blog\Model\CommentManager();
  $affectedLines = $commentManager->postComment($postId, $pseudo, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
