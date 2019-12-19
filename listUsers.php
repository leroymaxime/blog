<?php
require('controller/frontend.php');
try { 
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
    } 
    else {
        listUsers();
    }
} 
catch(Exception $e) {
    echo 'Erreur : ' .$e->getMessage();
    require('view/errorView.php');
}