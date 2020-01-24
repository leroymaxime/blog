<?php $title = 'Commentaires'; ?>
<?php ob_start(); ?>

<div class="row">
  <h1>Liste des commentaires en ligne</h1>
  </div>
  <br />
  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Pseudo</th>
      <th scope="col">Commentaire</th>
      <th scope="col">Approuvé</th>
      <th scope="col">Créer le </th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
          while ($data = $listComments->fetch()) {
        ?> 
    <tr>
      <th scope="row"><?= htmlspecialchars($data['id']); ?></th>
      <td><?= htmlspecialchars($data['pseudo']); ?></td>
      <td><?= htmlspecialchars($data['content']); ?></td>
      <td><?= htmlspecialchars($data['approuved']); ?></td>
      <td><?= htmlspecialchars($data['created_at']); ?></td>
      <td><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Consulter</a><br />
      <a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Editer</a><br />
          <a href="admin.php?action=delete&amp;id=<?= $data['id'] ?>">Supprimer</a></td>
    </tr>
    <?php 
        }
        $listComments->closeCursor();
        ?>
  </tbody>
</table>

    <?php $content = ob_get_clean(); ?>

<?php require('templateAdmin.php');