<?php
ob_start();
require('controller/frontend.php');
try {
    if (isset($_GET['action'])) {
        // if ($_SESSION)
        if ($_GET['action'] == 'listPosts') {
            listPosts();
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