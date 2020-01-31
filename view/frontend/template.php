
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Accueil du blog</title>
<link rel="stylesheet" href="styles/app.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=inscription">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=login">Connexion</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="admin.php">Admin</a>
            </li>
      </ul>
    </div>
  </nav>
  <main class="container">
  <?php if(!isset($_SESSION['email'])) { 
          echo 'NO';
        } else {
          echo '<h1>' . 'Bonjour ' . $login['email'] . '</h1>';} ?>
    <?= $content ?>
  </main>
</body>
</html>