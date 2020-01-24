<?php $title = 'Membres Inscrits'; ?>
<?php ob_start(); ?>

<div class="row">
  <h1>Liste des membres inscrits</h1>
  </div>
  <br />
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
          while ($data = $users->fetch()) {
        ?> 
    <tr>
      <th scope="row"><?= htmlspecialchars($data['id']); ?></th>
      <td><?= htmlspecialchars($data['last_name']); ?></td>
      <td><?= htmlspecialchars($data['first_name']); ?></td>
      <td><?= htmlspecialchars($data['email']); ?></td>
      <td><a href="admin.php?action=user&amp;id=<?= $data['id'] ?>">Consulter</a><br />
          <a href="admin.php?action=deleteUser&amp;id=<?= $data['id'] ?>">Supprimer</a></td>
    </tr>
    <?php 
        }
          $users->closeCursor();
        ?>
  </tbody>
</table>

    <?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php');