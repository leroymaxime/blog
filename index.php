<?php
ob_start();
require_once('controller/frontend.php');
require_once('model/Manager.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0)  {
                $id = trim($_GET['id']);
                /*$db = new \PDO('mysql:host=localhost;dbname=portfolio_blog;charset=utf8', 'root', '', [
      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
      ]);*/
                Post();
                
                }
            }
        /* elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0)  {
                post();  
            } else {
                echo 'erreur : LE BILLET EXISTE PAS !!!';
            }
        }*/

        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
                }
                else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            }
            else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }

        elseif ($_GET['action'] == 'login') {
            connect();
        }
    } 
    else {
        listPosts();
    }
} 
catch(Exception $e) {
    echo 'Erreur : ' .$e->getMessage();
    
}
$content = ob_get_clean();
require('view/frontend/template.php');