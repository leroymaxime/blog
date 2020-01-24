<?php

require_once('model/frontend.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function admin() {
  require('view/frontend/adminView.php');
}

function listUsers() {
  $userManager = new \Projet\Blog\Model\UserManager();
  $users = $userManager->getUsers();
  require('view/frontend/listUsersView.php');
}

function user() {
  $userManager = new \Projet\Blog\Model\UserManager();
  $user = $userManager->getUser($_GET['id']);
  require('view/frontend/userView.php');
}

function deleteOneUser() {
  $userManager = new \Projet\Blog\Model\UserManager();
  $delete = $userManager->deleteUser($_GET['id']);
}

function listArticles() {
  $postManager = new \Projet\Blog\Model\PostManager(); // Création d'un objet
  $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
  
  require('view/frontend/tablePostsView.php');
}

function addPostView() {
  require('view/frontend/addPostView.php');
}

function addPost($title, $slug, $introduction, $content)
{
  $postManager = new \Projet\Blog\Model\PostManager();
    $addArticle = $postManager->postPost($title, $slug, $introduction, $content);

    if ($addArticle === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: index.php');
    }
}

function delete() {
  $postManager = new \Projet\Blog\Model\PostManager();

  $delete = $postManager->deletePost($_GET['id']);
}

function comments() {
  $commentManager = new \Projet\Blog\Model\CommentManager();
  $listComments = $commentManager->listComments();

  require('view/frontend/listCommentsView.php');
}

function updateOneComment($content)
{
  $commentManager = new \Projet\Blog\Model\CommentManager();
  $affectedLines = $commentManager->updateComment($content);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php');
    }
}

