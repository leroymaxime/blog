<?php ob_start(); ?>
    <p><a href="admin.php?action=listUsers">Retour à la liste des membres</a></p>
    <h1><?= htmlspecialchars($user['id']); ?></h1>
    <em>Posté le : <?= htmlspecialchars($user['first_name']); ?></em><br />
      <em><?= htmlspecialchars($user['last_name']); ?></em>
      <p><?= htmlspecialchars($user['email']); ?></p>
       <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>