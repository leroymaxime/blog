<?php

require('model/frontend.php');

function listUsers() {
  $users = getUsers();
  require('view/frontend/listUsersView.php');
}

function user() {
  $user = getUser($_GET['id']);
  require('view/frontend/userView.php');
}

function listPosts() {
  $posts = getPosts();
  require('view/frontend/listPostsView.php');
}

function post() {
  $post = getPost($_GET['id']);
  $comments = getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function postExist() {
  $idExist = idExist($_GET['id']);
}

function delete() {
  $delete = deletePost($_GET['id']);

}

function addComment($postId, $pseudo, $comment)
{
    $affectedLines = postComment($postId, $pseudo, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}