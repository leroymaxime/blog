<?php $title = 'Inscription'; ?>
<?php ob_start(); ?>

<div class="row"><h1>Inscription</h1></div>
  <br />
    <?php
      require('model/frontend.php');
      $db = dbConnect();
      if(isset($_POST['confirm_inscription'])) {
        if(isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['confirm_password'])) {
          if(!empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirm_password'])) {
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $confirm_password = trim(htmlspecialchars($_POST['confirm_password']));
            
            if(strlen($email) <= 255) {
              if (filter_var($email, FILTER_VALIDATE_EMAIL))  {

                // INSERER FONCTION VERIFICATION SI EMAIL EXISTE DEJA DANS BDD
                /*$reqmail = $db->prepare("SELECT * FROM membres WHERE email = ?");
                $reqmail->execute(array($email));
                $mailexist = $reqmail->rowcount();*/
                if ($mailexist == 0) {
                  if(strlen($password) >= 8 AND strlen($password) <= 100) {
                    if($password == $confirm_password) {
                      $password_crypted = password_hash($_POST['password'], PASSWORD_DEFAULT);

                      // INSERER FONCTION INSCRIPTION
                      /*$req = $db->prepare('INSERT INTO membres (email, password, inscription_date) VALUES (?,?, NOW())');
                      $req->execute(array($email, $password_crypted));*/

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


<?php $content = ob_get_clean(); ?>
<?php require('template.php');