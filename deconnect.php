<?php
session_start();
?>
<?php 
//vérification si le membre est passé par la page de login : 
if(!isset($_SESSION['email'])) 
{ 
    Header('location:index.php');
} else {
?>
<?php
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('email', '');
setcookie('password', '');
header('location: index.php');
?>
<?php
}
?>