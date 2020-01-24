<?php
session_start();

if(isset($_SESSION['id'])) {
  $db = dbConnect();
  $req = $db->prepare("SELECT * FROM membres WHERE id = ?");
  $req->execute(array($_SESSION['id']));
  $user = $req->fetch();   
} else {
  $user = NULL;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Accueil Administration</title>
<link rel="stylesheet" href="styles/app.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="admin.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php?action=listUsers">Membres Inscrits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php?action=listPosts">Articles en ligne</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php?action=addPost">Ajouter article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <?php 
          if(!isset($_SESSION['email'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=connexion">Connexion</a>
            </li>
          <?php }  else {?>
            <li class="nav-item">
              <a class="nav-link" href="deconnect.php">Deconnect</a>
            </li>
        <?php  } ?>
      </ul>
    </div>
  </nav>
  <main class="container">
  <?php if(!isset($_SESSION['email'])) 
{ 
  echo '<h1>Bienvenu sur le blog !</h1>';
}else {
  echo '<h1>Bienvenu sur l\'Administration' . ' ' . $user['email'] . ' ' . $user['role'] . '!</h1>';
}
?>
    <?= $content ?>
  </main>
</body>
</html>