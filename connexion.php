<?php
// On se connecte à MySQL
require('model/frontend.php');


if (isset($_POST['email']) AND isset($_POST['password']))
{
    if (!empty($_POST['email']) AND !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $db = dbConnect();
        $req = $db->prepare('SELECT id, password, role FROM membres WHERE email = :email');
        $req-> execute(array(
            'email' => $email));

        $resultat = $req->fetch();

         
        if (!$resultat OR !password_verify($_POST['password'], $resultat['password']))
        {
            echo 'Identifiant ou Mot De Passe incorrect.<br/>';
        }
        else
        {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $resultat['role'];
            header('location: admin.php');
        }
        $req->closeCursor();
    }
    else
    {
        echo 'Renseignez un Email et un Mot De Passe.<br/>';
    }
}

?>
<?php $titre='Se connecter au site' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion à l'espace membre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h1 class="center">Espace Membre</h1>
        <div class="row">
        </div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-8">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="connexion">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="Entrer votre email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Entrer votre mot de passe">
                    </div>
                    <button type="submit" name="confirm_login" class="btn btn-primary">Envoyer</button>
                </form>
                <p>Pas encore inscrit ? <a href="inscription.php">Créez-vous un compte !</a></p>
            </div>
        </div>
    </div>
</body>
</html>
