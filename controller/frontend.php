<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/ConnectManager.php');

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

function connect() {
  $connectManager = new \Projet\Blog\Model\ConnectManager();
    if (isset($_POST['email']) AND isset($_POST['password'])) {
      if (!empty($_POST['email']) AND !empty($_POST['password'])) {
        $login = $connectManager->connect();
        if (!$login OR !password_verify($_POST['password'], $login['password'])) {
          echo 'Identifiant ou Mot De Passe incorrect.<br/>';
        } else {
            session_start();
            $_SESSION['id'] = $login['id'];
            $_SESSION['email'] = $login['email'];
            $_SESSION['role'] = $login['role'];
            header('location: index.php');
        }
      } else {
        echo 'Renseignez un Email et un Mot De Passe.<br/>';
      }
    } require_once('view/frontend/connexion.php');
  } 