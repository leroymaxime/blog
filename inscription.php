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
          <a class="nav-link" href="aPropos.php">A Propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
        </li>
      </ul>
    </div>
  </nav>
  <main class="container">
  <div class="row"><h1>Inscription</h1></div>
  <br />
    <?php
      require('application/database.php');
      if(isset($_POST['confirm_inscription'])) {
        if(isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirm_password'])) {
          if(!empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password'])) {
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confirm_password = trim(htmlspecialchars($_POST['confirm_password']));
            
            if(strlen($email) <= 255) {
              if (filter_var($email, FILTER_VALIDATE_EMAIL))  {
                $reqmail = $db->prepare("SELECT * FROM membres WHERE email = ?");
                $reqmail->execute(array($email));
                $mailexist = $reqmail->rowcount();
                if ($mailexist == 0) {
                  if(strlen($password) >= 8 AND strlen($password) <= 100) {
                    if($password == $confirm_password) {
                      $password_crypted = password_hash($_POST['password'], PASSWORD_DEFAULT);

                      $req = $db->prepare('INSERT INTO membres (email, password, inscription_date) VALUES (?,?, CURDATE())');
                      $req->execute(array($email, $password_crypted));

                      echo 'Votre compte à bien été créé';
                    } else {
                      echo "Vos deux mots de passes ne correspondent pas";
                    }
                  } else {
                    echo 'Votre mot de passe doit faire 8 caractères minimum';
                  }
                } else {
                  echo 'Cette adresse mail est déjà utilisée';
                }
              } else {
                echo 'Votre email à un format incorrect';
              }
            } else {
              echo 'Votre email fait plus de 255 caractères, ce n\'est pas normal';
            }
          } else {
            echo 'Veuillez remplir tous les champs !';
          }
        }
      }
       

    ?>

  <form method="POST">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" placeholder="Votre email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Confirmer Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" name="confirm_password" class="form-control" placeholder="Confirmer votre mot de passe">
    </div>
  </div>
  <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous ! </a></p>
  <button type="submit" name="confirm_inscription" class="btn btn-primary">Connexion</button>
</form>
  </main>
</body>
</html>