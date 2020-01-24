<?php
require('controller/backend.php');
try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listArticles();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0)  {
                $id = trim($_GET['id']);
                $db = dbConnect();
                $reqid = $db->prepare("SELECT * FROM articles WHERE id = ?");
                $reqid->execute(array($id));
                $idexist = $reqid->rowcount();
                if ($idexist == 0) {
                echo 'erreur : LE BILLET EXISTE PAS !!!';
                } else {
                    post();
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        
        elseif ($_GET['action'] == 'addPost') {
            addPostView();
        }

        elseif ($_GET['action'] == 'listComment') {
            comments();
        }

        elseif ($_GET['action'] == 'newArticle') {
            if (!empty($_POST['title']) && !empty($_POST['slug']) && !empty($_POST['introduction']) && !empty($_POST['content'])) {
                addPost($_POST['title'], $_POST['slug'], $_POST['introduction'], $_POST['content']);
                header('Location: admin.php');
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }

        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0)  {
                $id = trim($_GET['id']);
                $db = dbConnect();
                $reqid = $db->prepare("SELECT * FROM comments WHERE id = ?");
                $reqid->execute(array($id));
                $idexist = $reqid->rowcount();
                if ($idexist == 0) {
                echo 'erreur : LE COMMENTAIRE EXISTE PAS !!!';
                } else {
                    comment();
                }
            } else {
                echo 'Erreur : aucun identifiant de commentaire envoyé';
            }
        }
        
        elseif ($_GET['action'] == 'delete') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete();
                header('Location: admin.php?action=listPosts');
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
        elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['content'])) {
                    updateOneComment($_GET['id'], $_POST['content']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    } 
    else {
        admin();
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listUsers') {
            listUsers();
        }
        elseif ($_GET['action'] == 'user') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                user();
            }
            else {
                echo 'Erreur : aucun identifiant d\'utilisateur envoyé';
            }
        }
        elseif ($_GET['action'] == 'deleteUser') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteOneUser();
                header('Location: admin.php?action=listUsers');
            }
            else {
                echo 'Erreur : Aucun identifiant d\'utilisateur envoyé !';
            }
        }
    } 
} 
catch(Exception $e) {
    echo 'Erreur : ' .$e->getMessage();
    
}