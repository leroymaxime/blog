<?php
    require('../../application/database.php');
    $req = $db->query('SELECT * FROM articles ORDER BY created_at DESC');
      ?>
      <table class="table">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Titre</th>
              <th scope="col">Date de publication</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
        <?php
          while ($posts = $req->fetch()) {
        ?>
        
        <tbody>
          <tr>
            <th scope="row"><?= $posts['id']; ?></th>
            <td><?= $posts['title']; ?></td>
            <td><?= $posts['created_at']; ?></td>
            <td>
              <a href="delete.php?id=<?= $posts['id']; ?>">Supprimer</a><br />
              <a href="edit.php?id=<?= $posts['id']; ?>">Editer</a>
            </td>
          </tr>
        </tbody>
      
    <?php 
    }
    $req->closeCursor();
?></table>